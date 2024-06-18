<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;

Paginator::useBootstrap();

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perpage = env('PER_PAGE');

        $user_arr = User::orderBy('id', 'desc')

            ->paginate($perpage)->withQueryString();

        return view('admin.user_list', compact('user_arr'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user_arr = DB::table('users')->orderBy('id')->get();

        return view('admin.user_create', compact('user_arr'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $obj = new User;

        $obj->name = $request['name'];

        $obj->email = $request['email'];

        $obj->password = bcrypt($request['password']);

        $obj->created_at = date('Y-m-d H:i:s');

        $obj->updated_at = date('Y-m-d H:i:s');

        $obj->address = $request['address'];

        $obj->number = $request['phone'];

        $obj->role = $request['role'];

        $obj->save();

        return redirect(route('user.index'))->with('message', 'Thêm thành công');
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
        $user = User::where('id', $id)->first();

        if ($user == null) {

            $request->session()->flash('message', 'Không có tài khoản này: ' . $id);

            return redirect('/admin/user');
        }

        $user_arr = DB::table('producer')->orderBy('order')->get();

        return view('admin/user_edit', compact(['user', 'user_arr']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $obj = User::find($id);
        $obj->name = $request['name'];

        $obj->email = $request['email'];

        $obj->password = bcrypt($request['password']);

        $obj->created_at = date('Y-m-d H:i:s');

        $obj->updated_at = date('Y-m-d H:i:s');

        $obj->address = $request['address'];

        $obj->number = $request['number'];

        $obj->role = $request['role'];
        $obj->save();

        return redirect(route('user.index'))->with('message', 'Cập nhập thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {

        $check = User::where('id', $id)->exists();

        if ($check == false) {

            $request->session()->flash('message', 'Tài khoản không tồn tại');

            return redirect('/admin/user');
        }

        User::where('id', $id)->delete();

        $request->session()->flash('message', 'Đã xóa tài khoản');

        return redirect('/admin/user');
    }
}
