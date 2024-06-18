<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Http\Requests\registerValid;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordResetMail;


class UserController extends Controller
{

    public function __construct()
    {

        $list_producer = DB::table('producer')->where('hidden', '=', 1)->orderBy('order')->get();

        View::share('list_producer', $list_producer);
    }

    function login()
    {
        return view('login');
    }

    function login_(Request $request)
    {
        if (auth()->guard('web')

            ->attempt(['email' => $request['email'], 'password' => $request['matkhau']])
        ) {

            $user = auth()->guard('web')->user();

            return redirect()->intended('/');
        } else return back()->with('thongbao', 'Email, Password không đúng');
    }
    function logout()
    {
        //auth()->guard('web')->logout(); hoặc

        Auth::guard('web')->logout(); //nhớ use Auth; ở đầu controller

        return redirect('login')->with('message', 'Bạn đã thoát');
    }
    function register()
    {
        return view('register');
    }

    function register_(registerValid $request)
    {
        $u = new User;

        $u->email = strtolower(trim(strip_tags($request['email'])));

        $u->name = trim(strip_tags($request['name']));

        $u->password = trim(strip_tags(Hash::make($request['password1'])));

        $u->address = trim(strip_tags($request['address']));

        $u->number = trim(strip_tags($request['number']));

        $u->save();

        $id_user = $u->id;

        if (auth()->guard('web')->attempt(['email' => $request['email'], 'password' => $request['password1']])) {

            $user = auth()->guard('web')->user();

            event(new Registered($user));

            return redirect('/thanks')->with('message', "Đăng ký hoàn tất!");
        } else return back()->with('message', 'Đăng ký không thành công');
    }
    function thanks()
    {
        return view('thanks');
    }
    function forgotPassword()
    {
        return view('forgotPassword');
    }
    function forgotPassword_(Request $request)
    {
        $email = $request['email'];
        $user = User::where('email', $email)->first();

        if ($user) {
            $password = rand(100000, 999999);
            $user->password = Hash::make($password);
            $user->save();

            // Send email
            $mailData = [
                'password' => $password,
            ];
            $mail = new PasswordResetMail($mailData);
            Mail::to($email)->send($mail);


            return redirect('/login')->with('message', 'Mật khẩu mới đã gửi vào email của bạn');
        } else {
            return back()->with('message', 'Email không tồn tại');
        }
    }
    function changePassword($id)
    {
        return view('changePassword', ['id' => $id]);
    }
    function changePassword_(Request $request, $id)
    {
        $user = User::find($id);

        if (Hash::check($request['password'], $user->password)) {
            $user->password = Hash::make($request['password1']);
            $user->save();
            return redirect('/login')->with('message', 'Đổi mật khẩu thành công');
        } else {
            return back()->with('message', 'Mật khẩu cũ không đúng');
        }
    }
}
