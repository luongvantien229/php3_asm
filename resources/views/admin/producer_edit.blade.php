@extends('admin/layoutadmin')

@section('title') Chỉnh loại sản phẩm @endsection

@section('content')

<form class="mt-5" action="{{route('producer.update', $producer->id )}}" method="post"

class="m-auto col-10 border border-primary p-3 mt-3 shadow-lg fs-5">

@csrf @method('PUT')

<div class='mb-3'>

<label> Tên nhà phân phối</label>

<input name="name" value="{{$producer->name}}" type="text"

class="form-control border-primary shadow-none">

</div>

<div class='mb-3'>

<label> Thứ tự</label>

<input name="order" value="{{$producer->order}}" type="number"

class="form-control border-primary shadow-none" min="1">

</div>

<div class='mb-3'>

<label> Ẩn hiện</label>

<input name="hidden" {{$producer->hidden==0?"checked":""}} type="radio" value="0"> Ẩn
    
<input name="hidden" type="radio" value="1" {{$producer->hidden==1?"checked":""}} > Hiện

</div>

<div class='mb-3'>

<button type="submit" class="btn btn-success py-2 px-5 border-0"> Lưu database</button>

</div>

</form>

@endsection