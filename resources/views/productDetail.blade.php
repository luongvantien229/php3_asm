@extends('layout')
@section('title')
    {{$product->name}}
@endsection
@section('content')
    <div id="productDetail" class="my-2">
        <h4 class="bg-info p-2 fs-4 text-white">Chi tiết sản phẩm {{$product->name}}</h4>
        <div id="data" class="d-flex row">
            <div id="left" class="col-md-6">
                <img src="{{$product->image}}" class="w-100" alt="Image of {{$product->name}}">
            </div>
            <div id="right" class="col-md-6 fs-5">
                <h3>{{$product->name}}</h3>
                <p>Giá: <del>{{number_format($product->price, 0, ",",".")}} VND</del></p>
                <p>Giá khuyến mãi: {{number_format($product->price - $product->promotional_price, 0, ",",".")}} VND</p>
                <p>Màu: {{$product->color}}</p>
                <p>Cân nặng: {{$product->weight}}</p>
                <p>Tính chất: {{$product->nature}}</p>
                <!-- <p><input type="number" value="1"></p> -->
                <a href="/addcart/{{$product->id}}" class="btn btn-primary">Thêm vào giỏ hàng</a>
            </div>
        </div>
    </div>
    @include('comment')
    @include('product_same_id')
@endsection