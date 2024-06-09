<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\producer;

use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

Paginator::useBootstrap();

class AdminProducerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = env('PER_PAGE') / 2;

        $producer_arr = producer::orderBy('order', 'asc')->paginate($perPage)->withQueryString();

        return view('admin.producer_list', compact('producer_arr'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.producer_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $obj = new producer;

        $obj->name = ucfirst($request['name']);

        $obj->hidden = $request['hidden'];

        $obj->order = $request['order'];


        $obj->save();

        return redirect(route('producer.index'))->with('message', 'Thêm thành công');
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
    public function edit(string $id) {

        $producer = producer::find($id);
        
        return view('admin.producer_edit', compact('producer'));
        
        }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $obj = producer::find($id);

        $obj->name = $request['name'];
        
        $obj->order = $request['order'];
        
        $obj->hidden = $request['hidden'];
        
        $obj->save();
        
        return redirect(route('producer.index'))->with('message', 'Cập nhập thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id) {

        $count_producer = DB::table('product')->where('producer_id', $id)->count();
        
        if($count_producer > 0){
        
        return redirect(route('producer.index'))->with('message', 'Không thể xóa mục này!');
        
        }
        
        $producer = producer::find($id);
        
        $producer->delete();
        
        return redirect(route('producer.index'))->with('message', 'Xóa thành công');
        
        }
}
