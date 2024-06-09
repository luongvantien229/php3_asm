@extends('layout')
@section('title')
Sản phẩm
@endsection
@section('content')
<div class="row mt-4">
    <!-- Sidebar -->
    <div class="col-sm-3 col mt-3">
        <div class="">
            <div class="" style="padding-top: 50px">
                <div class="list-group">
                    <a href="/product" class="list-group-item">Tất cả danh mục</a>
                    @foreach ($producer as $prod)
                    <a href="/product/{{ $prod->id }}" class="list-group-item">{{ $prod->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Product List -->
    <div class="col-sm-9 col">
       
    @if ($producer_id)
    <h1 class="bg-success mt-3 p-2 fs-5 text-white">Sản phẩm của {{ $producer->firstWhere('id', $producer_id)->name }}</h1>
@else
    <h1 class="bg-success mt-3 p-2 fs-5 text-white">Tất cả sản phẩm</h1>
@endif
        
        <div class="row" id="data">
            @foreach ($list_product as $product)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card" style="padding: 10px">
                    <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}" />
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">Giá: <del>{{ number_format($product->price, 0, ',', '.') }} VND</del></p>
                        <p class="card-text">Giá khuyến mãi: {{ number_format($product->price - $product->promotional_price, 0, ',', '.') }} VND</p>
                        <a href="/productDetail/{{ $product->id }}" class="btn btn-primary">Mua ngay</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Pagination -->
        <div class="container d-flex justify-content-center">
            <nav aria-label="Page navigation example">
                <div class="p-2">
                    {{ $list_product->onEachSide(5)->links() }}
                </div>
            </nav>
        </div>
    </div>

</div>
@endsection