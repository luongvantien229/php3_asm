@extends('admin/layoutadmin')

@section('title') Chinh tài khoản @endsection

@section('content')

<form class="mt-5" id="frm" method="post" action="{{route('user.update', $user->id )}}" class="m-auto w-10 border border-primary">

    @csrf @method('PUT')

    <h4 class="m-0 bg-warning p-2 fs-5"> CHỈNH TÀI KHOẢN</h4>

    <div class="mb-3 row px-2">

        <div class='col-6'> Tên tài khoản

            <input name="name" type="text" value="{{$user->name}}" class="form-control shadow-none border-primary">

        </div>

        <div class='col-6'> Email
            <input name="email" type="email" value="{{$user->email}}" class="form-control shadow-none border-primary">
        </div>

    </div>

    <div class="mb-3 row px-2">

        <div class='col-6'> Mật khẩu

            <input name="password" type="password" value="{{$user->password}}" class="form-control shadow-none border-primary">
        </div>

        <div class='col-6'> Số điện thoại

            <input name="number" type="text" value="{{$user->number}}" class="form-control shadow-none border-primary">
        </div>

    </div>

    <div class="mb-3 row px-2">

        <div class='col-6'> Địa chỉ

            <input name="address" type="text" value="{{$user->address}}" class="form-control shadow-none border-primary">
        </div>

        <div class='col-6'> Quền

            <select name="role" class="form-select shadow-none border-primary">

                <option value="0" {{$user->role==0? "selected":""}}> Khách hàng</option>

                <option value="1" {{$user->role==1? "selected":""}}> Admin</option>

            </select>

        </div>

    </div>  

    <div class='mb-3 px-2'>

        <button type="submit" class="btn btn-primary py-2 px-5 border-0"> Lưu database</button>

    </div>

</form>

@endsection