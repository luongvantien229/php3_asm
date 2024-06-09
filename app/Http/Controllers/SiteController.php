<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Arr;

use App\Models\comment;

use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();


class SiteController extends Controller
{
    function __construct(){
        $list_producer = DB::table('producer')->where('hidden', 1)->orderBy('order')->get();
        View::share('list_producer', $list_producer);
    }
    function index(){
        $new_product = DB::table('product')->where('hidden', 1)->orderBy('date', 'desc')->limit(3)->get();
        $hot_product = DB::table('product')->where('hidden', 1)->where('hot', 1)->orderBy('date', 'desc')->limit(4)->get();
        $view_product = DB::table('product')->where('hidden', 1)->orderBy('view', 'desc')->limit(4)->get();
        return view('home', ['new_product'=>$new_product, 'hot_product'=>$hot_product, 'view_product'=>$view_product]);
    }
    function productDetail($id = 0){
        if(is_numeric($id)==false)
        return redirect('/notification')->with('notification', "Không tồn tại sản phẩm có id= $id");
        $product = DB::table('product')->where('id', $id)->first();
        $id_producer = DB::table('product')->where('id', $id)->value('producer_id');
        $product_same_id = DB::table('product')->where('producer_id', $id_producer)->where('id', '<>', $id)->orderBy('view', 'desc')->limit(4)->get();
        $comment_arr = comment::where('id_product', $id)->orderBy('date','asc')->get();
        return view('productDetail', ['product'=>$product, 'product_same_id'=>$product_same_id, 'comment_arr'=>$comment_arr]);
    }
    function productInProducer($producer_id = 0){
        if(is_numeric($producer_id)==false)
        return redirect('/notification')->with('notification', "Không tồn tại danh mục có id= $producer_id");
        $perpage = 6;
        $producer_name = DB::table('producer')->where('id', $producer_id)->value('name');
        $list_product = DB::table('product')->where('producer_id', $producer_id)->paginate($perpage);
        // with query string
        return view('productInProducer', ['producer_id'=>$producer_id, 'producer_name'=>$producer_name, 'list_product'=>$list_product]);
    }
    function product($producer_id = null){
        $perpage = 6;
        $producer = DB::table('producer')->where('hidden', 1)->get();
    
        if ($producer_id) {
            $list_product = DB::table('product')
                ->where('hidden', 1)
                ->where('producer_id', $producer_id)
                ->paginate($perpage);
        } else {
            $list_product = DB::table('product')->where('hidden', 1)->paginate($perpage);
        }
    
        return view('product', ['producer' => $producer, 'list_product' => $list_product]);
    }
    function comment_save(){

        $id_user=1;
        
        $arr = request()->post();
        
        $id_product = (Arr::exists($arr, 'id_product'))? $arr['id_product']:"-1";
        
        $content = (Arr::exists($arr, 'content'))? $arr['content']:"";
        
        if ($id_product<=-1) return redirect("/notification")->with(['notification'=>'Không biết id_sp']);
        
        if ($content=="") return redirect("/notification")->with(['notification'=>'Nội dung không có']);
        
        comment::insert(
        
        ['id_user'=>$id_user, 'id_product'=>$id_product, 'content'=>$content, 'date'=>now()]
        
        );
        
        return redirect('/notification')->with(['notification'=>'Đã lưu bình luận']);
        
        }
    
    function notification(){
        return view('notification');
    }
}
