@extends('layout')

@section('title') Đăng ký thành viên @endsection

@section('content')

<form method="post" action="/change-password/{{Auth::user()->id}}"

class = "m-auto col-6 border border-primary mt-5" > @csrf

@if(Session::exists('message'))

<h5 class="alert alert-info text-center"> {{ Session::get('message') }} </h5>

@endif

<div class="mb-3"> <h3 class="text-center"> Thay đổi mật khẩu</h3> </div>

<div class="mb-3 px-3">

<label>Email</label>

<input type="text" name="email" class="form-control shadow-none p-2">

</div>

<div class="mb-3 px-3">

<label>Mật khẩu cũ</label>

<input type="password" name="password" class="form-control shadow-none p-2">

</div>
<div class="mb-3 px-3">

<label>Mật khẩu mới</label>

<input type="password" name="password1" class="form-control shadow-none p-2">

</div>


<div class="mb-3 px-3">

<button type="submit" class="btn btn-primary">Thay đổi</button>

</div>

</form>

@endsection