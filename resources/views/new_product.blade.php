<div id="new_product">
    <h2 class="bg-warning-subtle fs-4 p-2 m-0">New Product</h2>
    <div id="data" class="d-flex flex-wrap text-center">
        @foreach ($new_product as $product)
        <div class="col-md-4">
            <div class="border border-primary rounded bg-info-subtle m-2 mt-0">
                <h3 class="fs-5 p-2"><a href="/productDetail/{{$product->id}}" class="text-decoration-none">{{$product->name}}</a></h3>
                <img src="{{ $product->image }}" class="w-100" alt="Image of {{ $product->name }}">
                <p class="fs-5">Price: <del>{{ number_format($product->price, 0, ',', '.') }} VND</del></p>
                <p class="fs-5 fw-bolder">Promotion: {{ number_format($product->price - $product->promotional_price, 0, ',', '.') }} VND</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
