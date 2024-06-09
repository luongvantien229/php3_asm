<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<h1 class="text-center my-5">Đăng nhập vào Admin</h1>
<form action="{{url('admin/login')}}" method="post"

class="m-auto col-10 border border-primary p-3 mt-3 shadow-lg fs-5">@csrf

@if(session()->has('message'))

<div class="alert alert-danger p-3 mx-auto my-3 col-10 fs-5 text-center">

{!! session('message') !!}

</div>

@endif

<div class='mb-3'> <label> Email</label>

<input name="email" type="email" class="form-control border-primary shadow-none">

</div>

<div class='mb-3'> <label> Mật khẩu</label>

<input name="password" type="password" class="form-control border-primary shadow-none">

</div>

<div class='mb-3'>

<button type="submit" class="btn btn-success py-2 px-5 border-0">Đăng nhập</button>

</div>

</form>