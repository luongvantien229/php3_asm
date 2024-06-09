<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\product;

use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;

Paginator::useBootstrap();


class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perpage = env('PER_PAGE');

        $product_arr = product::orderBy('id', 'desc')

            ->paginate($perpage)->withQueryString();

        return view('admin.product_list', compact('product_arr'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $producer_arr = DB::table('producer')->orderBy('order')->get();

        return view('admin.product_create', compact('producer_arr'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $obj = new product;

        $obj->name = $request['name'];

        $obj->price = (int) $request['price'];

        $obj->promotional_price = (int) $request['promotional_price'];

        $obj->producer_id = (int) $request['producer_id'];

        $obj->date = $request['date'];

        $obj->image = $request['image'];

        $obj->hidden = $request['hidden'];

        $obj->nature = (int) $request['nature'];

        $obj->hidden = (int) $request['hidden'];

        $obj->hot = (int) $request['hot'];

        $obj->description = $request['description'];

        $obj->color = $request['color'];

        $obj->weight = $request['weight'];

        $obj->save();

        return redirect(route('product.index'))->with('message', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {

        $product = product::where('id', $id)->first();

        if ($product == null) {

            $request->session()->flash('message', 'Không có sản phẩm này: ' . $id);

            return redirect('/admin/product');
        }

        $producer_arr = DB::table('producer')->orderBy('order')->get();

        return view('admin/product_edit', compact(['product', 'producer_arr']));
    }

    public function update(Request $request, string $id) {

        $obj = product::find($id);
        
        $obj->name = $request['name'];
        
        $obj->price = (int) $request['price'];
        
        $obj->promotional_price = (int) $request['promotional_price'];
        
        $obj->hidden = (int) $request['hidden'];
        
        $obj->hot = (int) $request['hot'];
        
        $obj->producer_id    = (int) $request['producer_id '];
        
        $obj->nature = (int) $request['nature'];
        
        $obj->date = $request['date'];
        
        $obj->image = $request['image'];
        
        $obj->description = $request['description'];
        $obj->color = $request['color'];

        $obj->weight = $request['weight'];
        
        $obj->save();
        
        return redirect(route('product.index'))->with('message', 'Cập nhập thành công');
        
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {

        $check = product::where('id', $id)->exists();

        if ($check == false) {

            $request->session()->flash('message', 'Sản phẩm không tồn tại');

            return redirect('/admin/product');
        }

        product::where('id', $id)->delete();

        $request->session()->flash('message', 'Đã xóa sản phẩm');

        return redirect('/admin/product');
    }
}
