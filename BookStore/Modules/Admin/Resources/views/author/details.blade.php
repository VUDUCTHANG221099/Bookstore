{{-- {{dd($author)}} --}}
@extends('admin::layouts.master',['link'=>"Tác giả $author->author_name"])
@section('breadcrumb_sub')
    <li class="breadcrumb-item"><a href="javascript:void(0)" class="admin_author">Tác giả</a></li>
    <li class="breadcrumb-item active">Tác giả {{ $author->author_name }}</li>

@endsection


@section('title', "Tác giả $author->author_name")

@section('content')
    <div class="container row">

        <div class="col">
            <div class="card">
                <h2 class="text-center"><span class="font-weight-bold">Tác giả:</span> <span
                        class="text-cyan">{{ $author->author_name }} </span></h2>
                <img class="card-img-top"
                    src="{{ isset($author->avatar) ? asset('images/author/' . $author->avatar) : asset('images/default.jpg') }}"
                    alt="{{$author->author_name}}">
                <div class="card-body">
                    <h3>
                        <p class="card-text">Ngày sinh: <span
                                class="text-cyan">{{ $carbon::parse($author->birth_date)->translatedFormat('d/m/Y') }}</span>
                        </p>
                        <p class="card-text">Chuyên viết: <span
                                class="text-cyan">{{ $author->cate_name }}</span></p>
                    </h3>
                </div>
            </div>

        </div>
        <div class="col">



            <div class="card-head">
                <h4 class="font-italic font-weight-bold">Đôi nét tiểu sử</h4>
            </div>
            <div class="card-body text-justify">

                {!! $author->description !!}
            </div>
        </div>
    </div>

    </div>
    </div>
@endsection

@include('admin::ajax.ajaxAuthor')
@include('admin::ajax.view')
