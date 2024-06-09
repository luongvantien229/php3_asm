@extends('admin/layoutadmin')

@section('title') Danh sách sản phẩm @endsection

@section('content')

@if(session()->has('message'))

<div class="alert alert-danger p-3 mx-auto my-3 col-10 fs-5 text-center">

{!! session('message') !!}

</div>

@endif

<table class="table table-bordered m-auto" id="dssanpham">

<div class="d-flex flex-1 justify-content-between bg-info-subtle border border-primary mt-5">
    <h2 class="p-2 fs-4 mb-0">Danh sách sản phẩm</h2>
    <a href="/admin/product/create" class="btn text-primary" style="font-size: 20px;">Thêm sản phẩm</a>
</div>

<tr><th>Hình</th> <th>Tên sản phẩm </th> <th>Lượt xem </th> <th>Giá</th>

<th>Ngày</th> <th>Trạng thái</th> <th>Sửa Xóa</th>

</tr>

@foreach($product_arr as $product)

<tr><td><img src="{{$product->image}}" width="120" height="80"></td>
<td>{{$product->name}}</td>

<td><b>{{$product->ten_sp}}</b> <br> Lượt xem: {{$product->view}}

</td>

<td>Giá:{{ number_format($product->price    ,0,',', '.') }} <br>

KM : {{ number_format($product->promotional_price,0,',', '.') }}

</td>

<td> {{date('d/m/ Y',strtotime($product->date))}}</td>

<td> Ẩn hiện: {{($product->hidden==0)? "Đang ẩn":"Đang hiện"}} <br>

Nổi bật: {{($product->hot==0)? "Bình thường":"Nổi bật"}}

</td>

<td> <a class="btn btn-primary btn-sm" href="{{route('product.edit', $product->id)}}">Sửa</a> <form class="d-inline" action="{{ route('product.destroy', $product->id) }}" method="POST">

@csrf @method('DELETE')

<button type='submit' onclick="return confirm('Bạn muốn xóa??')" class="btn btn-danger btn-sm">

Xóa

</button>

</form> </td>

</tr>

@endforeach

<tr> <td colspan="6"> {{ $product_arr->links() }} </div> </td> </tr>

</table>

@endsection