@extends('layout')
@section('title')
Product of {{$producer_name}}
@endsection
@section('content')
<div id="list_product" class="my-2">
    <h4 class="bg-info p-2 h5 text-white">Product of {{$producer_name}}</h4>
    <div id="data" class="d-flex flex-wrap text-center">
        @foreach ($list_product as $product)
            <div class="col-md-4">
                <div class="border border-primary rounded bg-info-subtle m-2 mt-0">
                    <h4 class="p-2"><a href="/productDetail/{{$product->id}}" class="text-decoration-none">{{$product->name}}</a></h4>
                    <img src="{{$product->image}}" class="w-100" alt="Image of {{$product->name}}">
                    <p class="fs-5">Price: <del>{{number_format($product->price, 0, ",",".")}} VND</del></p>
                    <p class="fs-5 fw-bolder">Promotion: {{number_format($product->price - $product->promotional_price, 0, ",",".")}} VND</p>
                </div>
            </div>
        @endforeach
    </div>
    <div class="p-2">
        {{ $list_product->onEachSide(5)->links() }}
    </div>
</div>
@endsection