@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    {{-- <h3 class="text-center">Welcome {{ Auth::user()->name }}</h3> --}}
    @yield('content_bo')
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="{{ asset('js/app.js') }}"></script>

    
@stop

