@extends('layout')
@section('title')
Thông báo
@endsection
@section('content')
@if (session()->has('notification'))
    <div class="alert alert-info p-5 shadow-lg border-2 border border-info m-5 fs-3 text-center">
        <h1>Thông báo</h1>
        <p></p>{{ Session::get('notification') }}</p>
    </div>
@endif
@endsection