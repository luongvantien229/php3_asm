@extends('layout')

@section('title') Đăng ký thành viên @endsection

@section('content')

<form method="post" action="{{url('/register')}}"

class="m-auto col-10 border border-2 border-primary rounded mt-3 shadow-lg"> @csrf

<h3 class="text-center mt-2">ĐĂNG KÝ THÀNH VIÊN</h3>

<div class="m-3 mt-0 row">

<div class="col-6"> Email

<input name="email" value="{{old('email')}}" type="text"

class="form-control border-primary shadow-none p-2">

<b class="text-danger"> @error('email') {{ $message }} @enderror </b>

</div>

<div class="col-6">Họ tên

<input name="name" value="{{old('name')}}" type="text"

class="form-control border-primary shadow-none p-2">

<b class="text-danger"> @error('name') {{ $message }} @enderror </b>

</div>

</div>

<div class="m-3 row">

<div class="col-6"> Mật khẩu

<input name="password1" value="{{old('password1')}}" type="password"

class="form-control border-primary shadow-none p-2">

<b class="text-danger"> @error('password1') {{ $message }} @enderror </b>

</div>

<div class="col-6"> Nhập lại mật khẩu

<input name="password2" value="{{old('password2')}}" type="password"

class="form-control border-primary shadow-none p-2">

<b class="text-danger"> @error('password2') {{ $message }} @enderror </b>

</div>

</div>

<div class="m-3 row">

<div class="col-6"> Địa chỉ

<input name="address" value="{{old('dia_chi')}}" type="text"

class="form-control border-primary shadow-none p-2">

<b class="text-danger"> @error('dia_chi') {{ $message }} @enderror </b>

</div>

<div class="col-6"> Điện thoại

<input name="number" value="{{old('dien_thoai')}}" type="text"

class="form-control border-primary shadow-none p-2">

<b class="text-danger"> @error('dien_thoai') {{ $message }} @enderror </b>

</div>

</div>

<div class="m-3 row">

<div><button class="btn btn-primary py-2 px-5"type="submit">Đăng ký</button>
<button class="btn btn-success py-2 px-5" type="button"><a href="/login" style="text-decoration: none; color: white;">Đăng nhập</a></button>
<button class="btn btn-warning py-2 px-5" type="button"><a href="/forgot-password" style="text-decoration: none; color: #000;">Quên mật khẩu</a></button>
</div>


</div>

</form>

@endsection