@extends('layout')

@section('title') Giỏ hàng của bạn @endsection

@section('content')



<div class="container" style="padding-top: 100px; padding-bottom: 100px;">
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                    <th>Hành động</th>
                    <th>Tổng tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $item)
                <?php $total = $item['price'] * $item['quantity']; ?>
                <tr>
                    <td class=""><b>{{ $item['name'] }}</b></td>
                    <td>
                        <form action="/updatecart" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item['id'] }}">
                            <input type="number" name="quantity" value="{{ $item['quantity'] }}" class="form-control m-auto w-75 border-border-secondary shadow-none" onchange="this.form.submit()">
                        </form>
                    </td>
                    <td class="">{{ number_format($item['price'], 0, ',', '.') }} VNĐ</td>
                    <td class="">{{ number_format($item['totalprice'], 0, ',', '.') }} VNĐ</td>
                    <td class="">
                        <a href="/delcart/{{ $item['id'] }}" class="btn btn-danger btn-sm">Xóa</a>
                    </td>

                    <td class="">{{ number_format($total, 0, ',', '.') }} VNĐ</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2"></td>
                    <td>Tổng số lượng</td>
                    <td>{{$totalquantity}}</td>
                    <td>Tổng tiền cần thanh toán</td>
                    <td>{{ number_format($totalprice, 0, ',', '.') }} VNĐ</td>
                </tr>
            </tfoot>

        </table>

    </div>

    @endsection