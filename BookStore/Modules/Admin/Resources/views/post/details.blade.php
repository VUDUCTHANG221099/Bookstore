{{-- {{dd($book)}} --}}
@extends('admin::layouts.master',['link'=>"Bài viết chi tiết"])
@section('breadcrumb_sub')
    <li class="breadcrumb-item"><a href="javascript:void(0)" class="admin_posts">Bài viết</a></li>
    <li class="breadcrumb-item active">Bài viết chi tiết</li>

@endsection


@section('title', $post->title)

@section('content')
    <div class="container row">

        <div class="col">
            <div class="card">
                <h3 style="font-size:25px"><span class="font-weight-bold">Bài viết:</span> <span
                        class="text-cyan">{{ $post->title }} </span></h3>
                <img class="card-img-top"
                    src="{{ isset($post->avatar) ? asset('images/post/' . $post->avatar) : asset('images/default.jpg') }}"
                    alt="{{$post->title}}">
                <div class="card-body">
                    <h3>
                        {{-- <span class="money">50000</span> --}}
                        <ul>
                            <li>
                                <p class="card-text ">Người viết: <span class="text-cyan">

                                        {{ $post->full_name }}

                                    </span>
                                </p>
                            </li>
                            <li>
                                <p class="card-text">Ngày giờ tạo: <span
                                        class="text-cyan">{{ $carbon::parse($post->create_at)->translatedFormat('d/m/Y H:i:s') }}</span>
                                </p>
                            </li>
                            
                        </ul>

                    </h3>

                </div>
            </div>


        </div>
        <div class="col">



            <div class="card-head">
                <h4 class="font-italic font-weight-bold">Nội dung</h4>
            </div>
            <div class="card-body text-justify">

                {!! $post->description !!}

            </div>
        </div>
    </div>

    </div>
    </div>
@endsection

@include('admin::ajax.ajaxbook')
@include('admin::ajax.view')
