@extends('layout')

@section('title') Quên mật khẩu @endsection

@section('content')

<!-- nhap email gửi gmail về -->
<form method="post" action="{{url('/forgot-password')}}"
class="m-auto col-6 border border-primary mt-5"> @csrf
<input type="hidden" name="token" value="{{csrf_token()}}">
<div class="mb-3 px-3">
<label>Email</label>
<input type="text" name="email" class="form-control shadow-none p-2">
</div>
<div class="mb-3 px-3">
<button type="submit" name="btn" class="btn btn-primary">Gửi email</button>
</div>

@endsection