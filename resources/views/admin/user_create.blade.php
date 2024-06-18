@extends('admin/layoutadmin')

@section('title') Thêm tài khoản @endsection

@section('content')

<form class="mt-5" id="frm" method="post" action="{{route('user.store')}}" class="m-auto w-10 border border-primary"> @csrf

    <h4 class="m-0 bg-warning p-2 fs-5"> THÊM TÀI KHOẢN</h4>

    <div class="mb-3 row px-2">

        <div class='col-6'> Tên tài khoản

            <input name="name" type="text" class="form-control shadow-none border-primary">

        </div>

        <div class='col-6'> Email

            <input name="email" type="email" class="form-control shadow-none border-primary">
        </div>

    </div>

    <div class="mb-3 row px-2">

        <div class='col-6'> Mật khẩu

            <input name="password" type="password" class="form-control shadow-none border-primary">
        </div>

        <div class='col-6'> Số điện thoại

            <input name="phone" type="text" class="form-control shadow-none border-primary">
        </div>

    </div>

    <div class="mb-3 row px-2">

        <div class='col-6'> Địa chỉ

            <input name="address" type="text" class="form-control shadow-none border-primary">

        </div>

        <div class='col-6'> Quyền

            <select name="role" class="form-select shadow-none border-primary">

                <option value="0"> Khách hàng</option>

                <option value="1"> Admin</option>

            </select>
        </div>
    </div>
    

   

   

    <div class='mb-3 px-2'>

        <button type="submit" class="btn btn-primary py-2 px-5 border-0"> Lưu database</button>

    </div>

</form>

@endsection