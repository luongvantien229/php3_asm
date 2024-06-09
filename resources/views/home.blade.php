@extends('layout')
@section('title')
    Văn Tiến 
@endsection
@section('content')
@include('new_product')
@include('view_product')
<div class="img-session">
  <img src="https://images.fpt.shop/unsafe/fit-in/800x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2024/5/18/638516307529322833_F-H1_800x300.png" alt="" height="300px" width="100%" />
</div>
@include('hot_product')
@endsection