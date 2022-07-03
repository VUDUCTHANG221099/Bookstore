@extends('layouts.master') @section('title')
    {{ $postDetails->title }}
@endsection
@section('header_CSS')
<link rel="stylesheet" href="{{ asset('FrontEnd/assets/css/blog_article_style.scss.css') }}">
    
@endsection

@section('content')

@section('breadcrumd_sub')
    <li>
        <a href="javascript:void(0)" class="post">

            <span>Bài viết</span>
            <span class="mr_lr">&nbsp;<i class="fa fa-angle-right"></i>&nbsp;</span>
        </a>
    </li>
@endsection
@include('layouts.breadcrumb', [ 'link' => $postDetails->title])
{{-- <section class="bread-crumb">
        <span class="crumb-border"></span>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 a-left">
                    <ul class="breadcrumb">
                        <li class="home">
                            <a href="/"><span>Trang chủ</span></a>
                            <span class="mr_lr">&nbsp;<i class="fa fa-angle-right"></i>&nbsp;</span>
                        </li>

                        <li>
                            <a href="/tin-tuc"><span>Tin tức</span></a>
                            <span class="mr_lr">&nbsp;<i class="fa fa-angle-right"></i>&nbsp;</span>
                        </li>
                        <li>
                            <strong><span>Chuyện con ốc sên muốn biết tại sao nó chậm
                                    chạp</span></strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section> --}}
<div class="container article-wraper">
    <div class="wrap_background_aside margin-bottom-10">
        <div class="row">
            <section class="right-content col-lg-9 col-md-9 col-sm-12 col-xs-12 col-lg-push-3 col-md-push-3">
                <div class="box-heading relative"></div>
                <article class="article-main">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="article-details">
                                <h1 class="article-title">
                                    {{ $postDetails->title }}
                                </h1>
                                <div class="tag-share">
                                    <div class="social-sharing f-left">
                                        <div class="social-media"
                                            data-permalink="{{route('postdetails',['slug'=>$postDetails->slug])}}">
                                            <label>Chia sẻ: </label>

                                            <a target="_blank"
                                                href="//www.facebook.com/sharer.php?u={{route('postdetails',['slug'=>$postDetails->slug])}}"
                                                class="share-facebook" title="Chia sẻ lên Facebook">
                                                <i class="fab fa-facebook"></i>
                                            </a>

                                            <a target="_blank"
                                                href="//twitter.com/share?text={{$postDetails->title}}&amp;url={{route('postdetails',['slug'=>$postDetails->slug])}}"
                                                class="share-twitter" title="Chia sẻ lên Twitter">
                                                <i class="fab fa-twitter"></i>
                                            </a>

                                            <a target="_blank"
                                                href="//pinterest.com/pin/create/button/?url={{route('postdetails',['slug'=>$postDetails->slug])}}&amp;media={{asset("images/post/$postDetails->avatar")}}&amp;description={{$postDetails->title}}"
                                                class="share-pinterest" title="Chia sẻ lên pinterest">
                                                <i class="fab fa-pinterest"></i>
                                            </a>

                                            <a target="_blank"
                                                href="//plus.google.com/share?url={{route('postdetails',['slug'=>$postDetails->slug])}}"
                                                class="share-google" title="+1">
                                                <i class="fab fa-google"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="date">
                                    <span>{{ $postDetails->CountComments }} Bình luận ... Được đăng bởi
                                        {{ $postDetails->full_name }}</span>
                                </div>

                                <div class="article-content">
                                    <div class="rte">
                                        {!! $postDetails->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12">
                            <h5 class="title-form-coment margin-bottom-15">
                                Bình luận
                            </h5>

                            <div id="article-comments">
                                @if (isset($comments) and count($comments) > 0)
                                    <div class="hidden">{{ count($comments) }} bình luận</div>
                                    @foreach ($comments as $item)
                                        <div class="article-comment clearfix">
                                            <figure class="article-comment-user-image">
                                                @php
                                                    $rand=rand(1,9);
                                                @endphp
                                                <img src="{{ asset("/images/comments/$item->avatar") }}"
                                                    alt="binh-luan" class="block" />
                                            </figure>

                                            <div class="article-comment-user-comment">
                                                <p class="user-name-comment">
                                                    <strong>{{ $item->fullname }}</strong>
                                                    <a href="#article_comments"
                                                        class="btn-link pull-xs-right hidden">Trả
                                                        lời</a>
                                                </p>
                                                <span
                                                    class="article-comment-date-bull">{{ $carbon::parse($item->create_at)->translatedFormat('d/m/Y H:i:s') }}</span>
                                                <p>{{ $item->description }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="bg-warning">
                                        <div class="text-warning padding-10">
                                            Nội dung này chưa có bình luận, hãy gửi cho chúng tôi bình luận đầu tiên của
                                            bạn.
                                        </div>
                                    </div>
                                @endif



                            </div>



                            <div class="shop-pag text-right"
                                style="display: {{ $comments->hasPages() ? 'block' : 'none' }}">
                                <nav class="clearfix relative nav_pagi f-right w_100">
                                    @if (isset($comments))
                                        {{ $comments->appends(Request::all())->links('layouts.paginate') }}
                                    
                                    @endif
                                </nav>
                            </div>

                            <form>
                                {{-- <input name="FormType" type="hidden" value="article_comments" /> --}}
                                <input  type="hidden" value="{{$postDetails->id}}"  name="post_id" id="post_id"/>
                                <p class="alert alert-success" id="success" style="display: none" >
								 
                                  
                                    
                                </p>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-coment">
                                        <div class="row">
                                            <div class="margin-top-0 margin-bottom-30">
                                                <h5 class="title-form-coment">
                                                    Bình luận:
                                                </h5>
                                            </div>
                                            <div class="">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                                        <fieldset class="form-group">
                                                            <input placeholder="Họ và tên" type="text"
                                                                class="form-control form-control-lg"
                                                                id="fullname" name="fullname" required="" />
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                                        <fieldset class="form-group">
                                                            <input placeholder="Email"
                                                                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$"
                                                                type="email" class="form-control form-control-lg"
                                                                 name="email" required="" id="email"/>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                            <fieldset class="form-group col-xs-12 col-sm-12 col-md-12">
                                                <textarea placeholder="Viết bình luận" class="form-control form-control-lg" id="comment" name="comment" rows="6"
                                                    required=""></textarea>
                                            </fieldset>
                                            
                                            <div class="margin-bottom-fix margin-bottom-50-article clearfix">
                                                <button type="submit" class="btn btn-primary comment">
                                                    Gửi bình luận
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End form mail -->
                                </div>
                            </form>
                        </div>
                    </div>
                </article>
            </section>

            <aside class="blog_hai left left-content col-lg-3 col-md-3 col-sm-12 col-xs-12 col-lg-pull-9 col-md-pull-9">
                @include('layouts.list')
            </aside>
        </div>
    </div>
</div>
@endsection
