@extends('layout')

@section('title') Thành viên @endsection

@section('content')

<form method="post" action="{{url('/login')}}"

class = "m-auto col-6 border border-primary mt-5" > @csrf

@if(Session::exists('message'))

<h5 class="alert alert-info text-center"> {{ Session::get('message') }} </h5>

@endif

<div class="mb-3"> <h3 class="text-center"> Thành viên đăng nhập</h3> </div>

<div class="mb-3 px-3">

<label>Email</label>

<input type="text" name="email" class="form-control shadow-none p-2">

</div>

<div class="mb-3 px-3">

<label>Mật khẩu</label>

<input type="password" name="matkhau" class="form-control shadow-none p-2">

</div>

<div class="mb-3 px-3">

<button type="submit" name="btn" class="btn btn-primary">Đăng nhập</button>
<button type="button" class="btn btn-success"><a href="/register" style="text-decoration: none; color: white;">Đăng kí</a></button>
<button type="button" class="btn btn-warning"><a href="/forgot-password" style="text-decoration: none; color: #000;">Quên mật khẩu</a></button>

</div>

</form>

@endsection