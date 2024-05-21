<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();


class SiteController extends Controller
{
    function __construct(){
        $list_producer = DB::table('producer')->where('hidden', 1)->orderBy('order')->get();
        View::share('list_producer', $list_producer);
    }
    function index(){
        $new_product = DB::table('product')->where('hidden', 1)->orderBy('date', 'desc')->limit(6)->get();
        $hot_product = DB::table('product')->where('hidden', 1)->where('hot', 1)->orderBy('date', 'desc')->limit(6)->get();
        return view('home', ['new_product'=>$new_product, 'hot_product'=>$hot_product]);
    }
    function productDetail($id = 0){
        if(is_numeric($id)==false)
        return redirect('/notification')->with('notification', "There are no products with id: $id");
        $product = DB::table('product')->where('id', $id)->first();
        return view('productDetail', ['id'=>$id, 'product'=>$product]);
    }
    function productInProducer($producer_id = 0){
        if(is_numeric($producer_id)==false)
        return redirect('/notification')->with('notification', "There are no producer with id: $producer_id");
        $perpage = 6;
        $producer_name = DB::table('producer')->where('id', $producer_id)->value('name');
        $list_product = DB::table('product')->where('producer_id', $producer_id)->paginate($perpage);
        // with query string
        return view('productInProducer', ['producer_id'=>$producer_id, 'producer_name'=>$producer_name, 'list_product'=>$list_product]);
    }
    function notification(){
        return view('notification');
    }
}
