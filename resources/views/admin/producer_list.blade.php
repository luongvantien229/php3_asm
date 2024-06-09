@extends('admin/layoutadmin')

@section('title') Danh sách nhà phân phối @endsection

@section('content')
<div class="d-flex flex-1 justify-content-between bg-info-subtle border border-primary mt-5">
    <h2 class="p-2 fs-4 mb-0">Danh sách nhà phân phối</h2>
    <a href="/admin/producer/create" class="btn text-primary" style="font-size: 20px;">Thêm loại sản phẩm</a>
</div>


@if(session()->has('message'))

<div class="alert alert-danger p-3 mx-auto my-3 col-10 fs-5 text-center">

    {!! session('message') !!}

</div>

@endif

<table class="table table-bordered border border-primary">

    <tr class="text-center">

        <th>id</th>
        <th>Tên loại</th>
        <th>Thứ tự</th>
        <th>Ẩn hiện </th>
        <th>Hành động</th>

    </tr>

    @foreach ($producer_arr as $producer)

    <tr class="text-center">

        <td>{{$producer->id}}</td>

        <td>{{$producer->name}}</td>

        <td>{{$producer->order}}</td>

        <td>{{$producer->hidden==1?"Đang hiện":"Đang ẩn"}}</td>

        <td class="text-center"> <a href="{{url('admin/producer/'.$producer->id.'/edit')}}" class="btn btn-primary btn-sm mx-1">

                Chỉnh

            </a>
            <form class="d-inline" action="{{route('producer.destroy', $producer->id)}}" method="POST">

                @csrf @method('DELETE')

                <button type='submit' onclick="return confirm('Bạn muốn xóa??')" class="btn btn-danger btn-sm ms-1">Xóa</button>

            </form>

    </tr>

    @endforeach

</table>

<div class="text-center p-2">{{$producer_arr->links()}}</div>

@endsection