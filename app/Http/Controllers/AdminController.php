<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    function index()
    {
        $count_producer = DB::table('producer')->count();
        $count_product = DB::table('product')->count();
        $count_user = DB::table('users')->count();
        // 5 user mới
        $new_user = DB::table('users')->orderBy('id', 'desc')->limit(5)->get();
        // 5 nhà phân phối mới
        $new_producer = DB::table('producer')->orderBy('id', 'desc')->limit(5)->get();
        // 10 sản phẩm mới
        $new_product = DB::table('product')->orderBy('id', 'desc')->limit(10)->get();
        return view("admin/index", compact('count_producer', 'count_product', 'count_user', 'new_user', 'new_producer', 'new_product'));
    }

    function login()
    {
        return view("admin/login");
    }

    function login_(Request $request)
    {
        if (auth()->guard('admin')

            ->attempt(['email' => $request['email'], 'password' => $request['password']])
        ) {

            $user = auth()->guard('admin')->user();

            if ($user->role == 1) return redirect('admin/');

            else return back()->with('message', 'Bạn không đủ quyền');
        } else return back()->with('message', 'Email, Password không đúng');
    }
    function logout()
    {
        //auth()->guard('admin')->logout(); hoặc

        Auth::guard('admin')->logout(); //nhớ use Auth; ở đầu controller

        return redirect('admin/login')->with('message', 'Bạn đã thoát admin');
    }
    
}
