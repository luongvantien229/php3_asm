@extends('layout')
@section('title')
Notification
@endsection
@section('content')
@if (session()->has('notification'))
    <div class="alert alert-info p-5 shadow-lg border-2 border border-info m-5 fs-3 text-center">
        <h1>Notification</h1>
        <p></p>{{ Session::get('notification') }}</p>
    </div>
@endif
@endsection