@extends('layout')

@section('title', 'Welcome Page')

@section('content')

    <div class="container">
        <!-- Content inside container -->
    </div>
    <div class="mb-2">
        <a href="{{ url('/spare-parts/create') }}" role="button" class="btn btn-danger">เพิ่มอะไหล่</a>
    </div>
    <div class="mb-2">
        <a href="{{ url('/spare-parts') }}" role="button" class="btn btn-danger">ดูข้อมูลอะไหล่รถ</a>
    </div>
    <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit">Logout</button>
    </form>
@endsection
