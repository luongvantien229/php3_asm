<div class="row mt-5">
    <h1 class="mb-3">Sản phẩm cùng danh mục</h1>
    @foreach ($product_same_id as $product)
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card" style="padding: 10px">
            <img src="{{ $product->image }}" class="card-img-top" alt="Product">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">Giá: <del>{{ number_format($product->price, 0, ',', '.') }} VND</del></p>
                <p class="card-text">Giá khuyễn mãi: {{ number_format($product->price - $product->promotional_price, 0, ',', '.') }} VND</p>
                <a href="/productDetail/{{$product->id}}" class="btn btn-primary">Mua ngay</a>
            </div>
        </div>
    </div>
    @endforeach
</div>