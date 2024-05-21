@extends('layout')
@section('title')
    {{$product->name}}
@endsection
@section('content')
    <div id="productDetail" class="my-2">
        <h4 class="bg-info p-2 fs-4 text-white">Product Detail {{$product->name}}</h4>
        <div id="data" class="d-flex row">
            <div id="left" class="col-md-6">
                <img src="{{$product->image}}" class="w-100" alt="Image of {{$product->name}}">
            </div>
            <div id="right" class="col-md-6 fs-5">
                <h3>{{$product->name}}</h3>
                <p>Price: <del>{{number_format($product->price, 0, ",",".")}} VND</del></p>
                <p>Promotion: {{number_format($product->price - $product->promotional_price, 0, ",",".")}} VND</p>
                <p>Color: {{$product->color}}</p>
                <p>Weight: {{$product->weight}}</p>
                <p>Nature: {{$product->nature}}</p>
                <p><input type="number" value="1"></p>
                <button class="btn btn-primary">Add to cart</button>
            </div>
        </div>
    </div>
@endsection