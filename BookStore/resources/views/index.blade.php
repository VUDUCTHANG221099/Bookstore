@extends('layouts.master')
@section('title')
    Bookstore - website mua sách trực tuyến hàng đầu Việt Nam
@endsection
@section('content')
    {{-- {{$check}} --}}
    <div class="container">
        <div class="row">
            @include('home.banner')

            @include('home.book_left')
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                @include('home.book_new')
                @include('home.book_sale')
                @include('home.book_run')
            </div>
        </div>
    </div>
@endsection
