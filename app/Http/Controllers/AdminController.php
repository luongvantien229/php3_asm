<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    function index()
    {
        return view("admin/index");
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
