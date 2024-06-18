@extends('admin/layoutadmin')

@section('title') Trang chủ admin @endsection

@section('content')

<div class="content">
    <div class="container mt-4">
        <h1>Trang chủ thống kê</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Nhà phân phối</div>
                    <div class="card-body">
                        <h5 class="card-title">{{$count_producer}}</h5>
                        <p class="card-text">nhà phân phối</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-secondary mb-3">
                    <div class="card-header">Sản phẩm</div>
                    <div class="card-body">
                        <h5 class="card-title">{{$count_product}}</h5>
                        <p class="card-text">Sản phẩm</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">tài khoản</div>
                    <div class="card-body">
                        <h5 class="card-title">{{$count_user}}</h5>
                        <p class="card-text">tài khoản</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- New Row for Forms -->
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>5 tài khoản mới</span>
                        <a href="/admin/user" class="text-primary">Tất cả tài khoản</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($new_user as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <a href="{{route('user.edit', $user->id)}}" class="btn btn-primary btn-sm">Sửa</a>
                                        <form class="d-inline" action="{{ route('user.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn muốn xóa??')">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                        <span>5 nhà phân phối</span>
                        <a href="/admin/producer" class="text-primary">Tất cả nhà phân phối</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($new_producer as $producer)
                                <tr>
                                    <td>{{$producer->name}}</td>
                                    <td>
                                        <a href="{{route('user.edit', $user->id)}}" class="btn btn-primary btn-sm">Sửa</a>
                                        <form class="d-inline" action="{{ route('user.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn muốn xóa??')">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card mb-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                        <span>10 sản phẩm mới</span>
                        <a href="/admin/product" class="text-primary">Tất cả sản phẩm</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Nhà phân phối</th>
                                    <th scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($new_product as $product)
                                <tr>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->promotional_price}}</td>
                                    <td>{{$product->producer_id}}</td>
                                    <td>
                                        <a href="{{route('user.edit', $user->id)}}" class="btn btn-primary btn-sm">Sửa</a>
                                        <form class="d-inline" action="{{ route('user.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn muốn xóa??')">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection