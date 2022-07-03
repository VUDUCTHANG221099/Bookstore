@extends('layouts.master')
@section('title')
    Bài viết
@endsection
@section('header_CSS')
    <link rel="stylesheet" href="{{ asset('FrontEnd/assets/css/blog_article_style.scss.css') }}">
@endsection
@section('content')
    @include('layouts.breadcrumb', [ 'link' => 'Bài viết'])

    <div class="container">

        <div class="wrap_background_aside margin-bottom-10">
            <div class="row">
                <div class="content_all f-left w_100">
                    <div
                        class="right-content margin-bottom-fix margin-bottom-30-article col-lg-9 col-md-9 col-sm-12 col-xs-12 col-lg-push-3 col-md-push-3">
                        <h1 class="title_page">Bài viết</h1>
                        <div class="list-blogs-2 blog-main">
                            <div class="row">
                                @if (isset($post))
                                    @foreach ($post as $item)
                                        <!-- Bài viết -->
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 blog-col">
                                            <div class="myblog">
                                                <div class="blog_item">
                                                    <div class="content_right">
                                                        <h3>
                                                            <a href="{{ route('postdetails', ['slug' => $item->slug]) }}"
                                                                title="{{ $item->title }}">{{ $item->title }}</a>
                                                        </h3>
                                                        <span class="time_post">
                                                            <span>{{ $carbon::parse($item->create_at)->translatedFormat('d/m/Y H:i:s') }}</span>
                                                        </span>
                                                    </div>
                                                    <div class="right_item">
                                                        <div class="content_blog">
                                                            <div class="image-blog">
                                                                <a href="{{ route('postdetails', ['slug' => $item->slug]) }}"
                                                                    title="{{ $item->title }}">
                                                                    <img class="lazyload"
                                                                        src="{{ isset($item->avatar) ? asset("/images/post/$item->avatar") : asset('/images/default.jpg') }}"
                                                                        alt="{{ $item->title }}" style="width:420px;height:420px">
                                                                </a>
                                                            </div>
                                                            <div class="article-item-tags">Tags:

                                                            </div>
                                                            <span class="article-item-info">


                                                                {{ $item->CountComments }} Bình luận | Bài viết được đăng
                                                                bởi {{ $item->full_name }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Bài viết -->
                                    @endforeach
                                @endif

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 text-right">
                                <div class="text-paginate" style="display: {{ $post->hasPages() ? 'block' : 'none' }}">
                                    <nav class="clearfix relative nav_pagi f-right w_100">
                                        @if (isset($post))
                                            {{ $post->appends(Request::all())->links('layouts.paginate') }}
                                        @endif

                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <aside class="left left-content col-md-3 col-lg-3 col-sm-12 col-xs-12 col-lg-pull-9 col-md-pull-9">
                        @include('layouts.list')

                    </aside>
                </div>
            </div>
        </div>
    </div>

@endsection
