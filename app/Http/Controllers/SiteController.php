<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Arr;
use App\Models\product;
use App\Models\comment;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Pagination\Paginator;

Paginator::useBootstrap();


class SiteController extends Controller
{
    function __construct()
    {
        $list_producer = DB::table('producer')->where('hidden', 1)->orderBy('order')->get();
        View::share('list_producer', $list_producer);
    }
    function index()
    {
        $new_product = DB::table('product')->where('hidden', 1)->orderBy('date', 'desc')->limit(3)->get();
        $hot_product = DB::table('product')->where('hidden', 1)->where('hot', 1)->orderBy('date', 'desc')->limit(4)->get();
        $view_product = DB::table('product')->where('hidden', 1)->orderBy('view', 'desc')->limit(4)->get();
        return view('home', ['new_product' => $new_product, 'hot_product' => $hot_product, 'view_product' => $view_product]);
    }
    function productDetail($id = 0)
    {
        if (is_numeric($id) == false)
            return redirect('/notification')->with('notification', "Không tồn tại sản phẩm có id= $id");
        $product = DB::table('product')->where('id', $id)->first();
        $id_producer = DB::table('product')->where('id', $id)->value('producer_id');
        $product_same_id = DB::table('product')->where('producer_id', $id_producer)->where('id', '<>', $id)->orderBy('view', 'desc')->limit(4)->get();
        $comment_arr = comment::where('id_product', $id)->orderBy('date', 'asc')->get();
        return view('productDetail', ['product' => $product, 'product_same_id' => $product_same_id, 'comment_arr' => $comment_arr]);
    }
    function productInProducer($producer_id = 0)
    {
        if (is_numeric($producer_id) == false)
            return redirect('/notification')->with('notification', "Không tồn tại danh mục có id= $producer_id");
        $perpage = 6;
        $producer_name = DB::table('producer')->where('id', $producer_id)->value('name');
        $list_product = DB::table('product')->where('producer_id', $producer_id)->paginate($perpage);
        // with query string
        return view('productInProducer', ['producer_id' => $producer_id, 'producer_name' => $producer_name, 'list_product' => $list_product]);
    }
    public function product(Request $request, $producer_id = null)
    {
        $perpage = 6;
        $producer = DB::table('producer')->where('hidden', 1)->get();
        $query = $request->input('query');

        if ($query) {
            $list_product = DB::table('product')
                ->where('hidden', 1)
                ->where(function ($queryBuilder) use ($query) {
                    $queryBuilder->where('name', 'like', "%$query%")
                        ->orWhere(' description', 'like', "%$query%");
                })
                ->paginate($perpage);
        } elseif ($producer_id) {
            $list_product = DB::table('product')
                ->where('hidden', 1)
                ->where('producer_id', $producer_id)
                ->paginate($perpage);
        } else {
            $list_product = DB::table('product')->where('hidden', 1)->paginate($perpage);
        }

        return view('product', ['producer' => $producer, 'list_product' => $list_product, 'producer_id' => $producer_id]);
    }
    function comment_save()
    {

        $id_user = 1;

        $arr = request()->post();

        $id_product = (Arr::exists($arr, 'id_product')) ? $arr['id_product'] : "-1";

        $content = (Arr::exists($arr, 'content')) ? $arr['content'] : "";

        if ($id_product <= -1) return redirect("/notification")->with(['notification' => 'Không biết id_product']);

        if ($content == "") return redirect("/notification")->with(['notification' => 'Nội dung không có']);

        comment::insert(

            ['id_user' => $id_user, 'id_product' => $id_product, 'content' => $content, 'date' => now()]

        );

        return redirect('/notification')->with(['notification' => 'Đã lưu bình luận']);
    }
    function addcart(Request $request, $id_product = 0)
    {
        // từ id_product lấy ra tất cả thông tin của sản phẩm trong db
        $product = DB::table('product')->where('id', $id_product)->first();

        $productData = [
            'id' => $id_product,
            'name' => $product->name,
            'price' => $product->price,
            'image' => $product->image,
            'promotional_price' => $product->promotional_price,
            'quantity' => 1
        ];

        if ($request->session()->exists('cart') == false) { //chưa có cart trong session      
            $cart = [$productData];
            // Update the cart in the session
            $request->session()->put('cart', $cart);
            var_dump($cart);
        } else { // đã có cart, kiểm tra id_product có trong cart không
            $cart = $request->session()->get('cart');

            // Check if the product is already in the cart
            $found = false;
            foreach ($cart as &$item) {
                if ($item['id'] == $id_product) {
                    $item['quantity']++;
                    $found = true;
                    break;
                }
            }

            // If the product is not in the cart, add it
            if (!$found) {
                $cart[] = $productData;
            }

            // Update the cart in the session
            $request->session()->put('cart', $cart);
        }
        $cart = $request->session()->get('cart');
        return redirect('/viewcart');
        // $request->session()->forget('cart');
    }
    function viewcart(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        $totalprice = 0;
        $totalquantity = 0;


        // Update cart items with product details and calculate totals
        foreach ($cart as &$item) {
            // Fetch product details from the database using the product ID
            $product = DB::table('product')->where('id', $item['id'])->first();

            // Check if the product exists
            if ($product) {
                // Update cart item with product details
                $item['name'] = $product->name;
                $item['price'] = $product->promotional_price; // Use discounted price if available
                $item['image'] = $product->image;
                $item['totalprice'] = $item['price'] * $item['quantity'];

                // Calculate total quantity and amount
                $totalquantity += $item['quantity'];
                $totalprice += $item['totalprice'];
            }
        }

        // Update the cart in the session
        $request->session()->put('cart', $cart);

        // Return the view with the updated cart data
        return view('viewcart', compact('cart', 'totalquantity', 'totalprice'));
    }
    function delcart(Request $request, $id = 0)
    {

        $cart = $request->session()->get('cart');

        $index = array_search($id, array_column($cart, 'id'));

        if ($index != '') {

            array_splice($cart, $index, 1);

            $request->session()->put('cart', $cart);
        }

        return redirect('/viewcart');
    }
    function updatecart(Request $request)
    {
        $cart = $request->session()->get('cart');

        $id = $request->input('id');
        $quantity = $request->input('quantity');

        foreach ($cart as &$item) {
            if ($item['id'] == $id) {
                $item['quantity'] = $quantity;
                break;
            }
        }

        $request->session()->put('cart', $cart);

        return redirect('/viewcart');
    }
    function download()
    {
        return view("download");
    }

    function notification()
    {
        return view('notification');
    }
    function contact()
    {
        return view('contact');
    }
    function contact_(Request $request)
    {
        $arr = request()->post();
        $ht = trim(strip_tags($arr['ht']));
        $em = trim(strip_tags($arr['em']));
        $nd = trim(strip_tags($arr['nd']));
        $adminEmail = 'tienlvps31619@fpt.edu.vn'; //Gửi thư đến ban quản trị
        Mail::mailer('smtp')->to($adminEmail)
            ->send(new SendEmail($ht, $em, $nd));
        $request->session()->flash('message', "Đã gửi mail");
        return redirect("/notification")->with(['notification' => 'Đã gửi mail']);
    }
}
