@extends('layout')

@section('title') Quên mật khẩu @endsection

@section('content')
<form class="mt-5" class="col-10 mx-auto p-3 border border-primary" method="post" action="/contact">
    <h4>LIÊN HỆ</h4>
    <div class="mb-3">
        <label>Họ tên</label> <input class="form-control" name="ht" required>
    </div>
    <div class="mb-3">
        <label>Email</label> <input class="form-control" name="em" type="email" required>
    </div>
    <div class="mb-3">
        <label>Nội dung</label> <textarea class="col-md-9 form-control" name="nd"></textarea>
    </div>
    <div class="mb-3"> @csrf
        <button type="submit" class="btn btn-warning p-2">Gửi liên hệ</button>
    </div>
</form>
@endsection