@extends('admin/layoutadmin')

@section('title') Danh sách tài khoản @endsection

@section('content')

@if(session()->has('message'))

<div class="alert alert-danger p-3 mx-auto my-3 col-10 fs-5 text-center">

    {!! session('message') !!}

</div>

@endif

<table class="table table-bordered m-auto" id="dssanpham">

    <div class="d-flex flex-1 justify-content-between bg-info-subtle border border-primary mt-5">
        <h2 class="p-2 fs-4 mb-0">Danh sách tài khoản</h2>
        <a href="/admin/user/create" class="btn text-primary" style="font-size: 20px;">Thêm tài khoản</a>
    </div>

    <tr>
        <th>Tên sản phẩm </th>
        <th>Email </th>
        <th>Mật khẩu</th>

        <th>Địa chỉ</th>
        <th>Điện thoại</th>
        <th>Sửa Xóa</th>

    </tr>

    @foreach($user_arr as $user)

    <td>{{$user->name}}</td>

    <td><b>{{$user->email}}</b>

    </td>

    <td> {{$user->password}}</td>


    </td>

    <td> {{$user-> address}}</td>

    <td> {{$user->number}}

    </td>

    <td> <a class="btn btn-primary btn-sm" href="{{route('user.edit', $user->id)}}">Sửa</a>
        <form class="d-inline" action="{{ route('user.destroy', $user->id) }}" method="POST">

            @csrf @method('DELETE')

            <button type='submit' onclick="return confirm('Bạn muốn xóa??')" class="btn btn-danger btn-sm">

                Xóa

            </button>

        </form>
    </td>

    </tr>

    @endforeach

    <tr>
        <td colspan="6"> {{ $user_arr->links() }} </div>
        </td>
    </tr>

</table>

@endsection