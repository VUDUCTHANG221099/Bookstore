@extends('layouts.master')
@section('title')
    @if (Request()->is('tai-khoan'))
        Thông tin khách hàng
    @elseif (Request()->is('tai-khoan/don-hang'))
        Đơn hàng của bạn
    @elseif(Request()->is('tai-khoan/doi-mat-khau'))
        Đổi mật khẩu
    @elseif(Request()->is('tai-khoan/dia-chi'))
        Sổ địa chỉ
    @else
        Bài viết
    @endif
@endsection
@section('header_CSS')
    <link rel="stylesheet" href="{{ asset('FrontEnd/assets/css/account_order_style.scss.css') }}" type="text/css">
    <!--Upload Avatar-->
    <link rel="stylesheet" href="{{ asset('assets/upload/css/image.css') }}">
    <!--Upload Avatar-->
    {{-- <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"> --}}

    <!--ckeditor/ckfinder-->
    <script src="{{ asset('assets/editor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/editor/ckfinder/ckfinder.js') }}"></script>
@endsection
@section('content')
    @if (Request()->is('tai-khoan'))
        @include('layouts.breadcrumb', ['link' => 'Tài khoản'])
    @elseif(Request()->is('tai-khoan/don-hang'))
        @section('breadcrumd_sub')
            <li>
                <a href="javascript:void(0)" class="tai_khoan">

                    <span>Tài khoản</span>
                    <span class="mr_lr">&nbsp;<i class="fa fa-angle-right"></i>&nbsp;</span>
                </a>
            </li>
        @endsection
        @include('layouts.breadcrumb', ['link' => 'Đơn hàng'])
    @elseif(Request()->is('tai-khoan/doi-mat-khau'))
        @section('breadcrumd_sub')
            <li>
                <a href="javascript:void(0)" class="tai_khoan">

                    <span>Tài khoản</span>
                    <span class="mr_lr">&nbsp;<i class="fa fa-angle-right"></i>&nbsp;</span>
                </a>
            </li>
        @endsection
        @include('layouts.breadcrumb', ['link' => 'Đổi mật khẩu'])
    @elseif(Request()->is('tai-khoan/dia-chi'))
        @section('breadcrumd_sub')
            <li>
                <a href="javascript:void(0)" class="tai_khoan">

                    <span>Tài khoản</span>
                    <span class="mr_lr">&nbsp;<i class="fa fa-angle-right"></i>&nbsp;</span>
                </a>
            </li>
        @endsection
        @include('layouts.breadcrumb', ['link' => 'Sổ địa chỉ'])
    @else
        @section('breadcrumd_sub')
            <li>
                <a href="javascript:void(0)" class="tai_khoan">

                    <span>Tài khoản</span>
                    <span class="mr_lr">&nbsp;<i class="fa fa-angle-right"></i>&nbsp;</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0)" class="my_PostView">

                    <span>Bài viết</span>
                    <span class="mr_lr">&nbsp;<i class="fa fa-angle-right"></i>&nbsp;</span>
                </a>
            </li>
        @endsection
        @include('layouts.breadcrumb', ['link' => 'Cập nhật bài viết'])
    @endif

@section('breadcrumd_sub')
    <li>
        <a href="javascript:void(0)" class="tai_khoan">

            <span>Tài khoản</span>
            <span class="mr_lr">&nbsp;<i class="fa fa-angle-right"></i>&nbsp;</span>
        </a>
    </li>
@endsection
<section class="signup page_customer_account">
    <div class="container">
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-lg-3 col-left-ac">
                <div class="block-account">
                    <h5 class="title-account">Trang tài khoản</h5>
                    <p>Xin chào, <span style="color:#f26522;" class="Ho_Va_TenFE"></span>&nbsp;!</p>
                    <ul>
                        <li>
                            <a disabled="disabled" class="tai_khoan title-info" href="javascript:void(0);">Thông tin tài
                                khoản</a>
                        </li>
                        <li>
                            <a class="title-info my_orderView" href="javascript:void()">Đơn hàng của bạn</a>
                        </li>
                        <li>
                            <a class="title-info change_passwordView" href="javascript:void()">Đổi mật khẩu</a>
                        </li>
                        <li>
                            <a class="title-info my_addressView" href="javascript:void()">Sổ địa chỉ </a>
                        </li>
                        <li>
                            <a class="title-info my_PostView" href="javascript:void()">Bài viết của tôi</a>

                        </li>
                    </ul>
                </div>
            </div>
            <!--Profile-->
            {{-- @if (Request()->is('tai-khoan')) --}}
            @include('profile.index')

            {{-- @endif
            @if (Request()->is('tai-khoan/don-hang')) --}}

            @include('profile.order')

            {{-- @endif --}}

            @include('profile.changerPass')


            @include('profile.address')
            <div class="col-xs-12 col-sm-12 col-lg-9 col-right-ac my_post">

                <div class="UpdatePost">
                    <form class="has-validation-callback" method="post" action="{{ route('Update_Post') }}" enctype="multipart/form-data">
                        {{-- <span id="successPost"></span> --}}
                        @method('PUT')
                        @csrf
                        {{-- @csrf action="{{ route('CreatePost') }}" method="post" --}}
                        <div class="pop_bottom">
                            <div class="form_address">
                                <input type="hidden" value="{{$post->slug}}" name="slug">
                                <div class="field">
                                    <fieldset class="form-group">

                                        <h3>
                                            <label for="titleUpdate">
                                                Tiêu đề</label>
                                        </h3>
                                        <input type="text" placeholder="Tiêu đề" class="form-control titleUpdate" id="titleUpdate"
                                            name="titleUpdate" value="{{$post->title}}">
                                        
                                    </fieldset>
                                </div>
                                <div class="field">
                                    <div class="col-4">
                                        <div class="uploader">
                                            <input id="file-upload" type="file" name="illustrationUpdate" accept="*" />
                                            <label for="file-upload" id="file-drag">
                                                <img id="file-image"
                                                    src="{{ isset($post->avatar) ? asset('images/post/' . $post->avatar) : false }}"
                                                    alt="Preview" class="{{ isset($post->avatar) ? false : 'hidden' }}">
                                                <div id="start" class="{{ isset($post->avatar) ? 'hidden' : false }}">
                                                    <i class="fa fa-download" aria-hidden="true"></i>
                                                    <div>Hình ảnh minh họa</div>
                                                    <div id="notimage" class="hidden">Please select an image</div>
                                                    <span id="file-upload-btn" class="btn btn-primary">send images</span>
                                                </div>
                                                <div id="response" class="hidden">
                                                    <div id="messages"></div>
                                                    <progress class="progress" id="file-progress" value="0">
                                                        <span>0</span>%
                                                    </progress>
                                                </div>
                                            </label>
                        
                                        </div>

                                    </div>
                                </div>
                                <div class="field">
                                    <textarea class="form-control" id="desc_post" name="desc_post" style="height: 300px;">
                                    
                                        {{ $post->description }}
                                    </textarea>
                                    
                                   <script>
                                        CKEDITOR.replace('desc_post');
                                    </script>
                                </div>




                            </div>
                            <div class="btn-row">

                                <button class="btn btn-lg btn-primary btn-submit" 
                                    type="submit"><span>Cập nhật bài viết</span></button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            {{-- @include('profile.post') --}}

        </div>
    </div>
</section>
@section('footer_JS')
    {{-- <script src="{{asset('assets/datatables/js/jquery.dataTables.min.js')}}"></script> --}}

    <script src="{{ asset('assets/upload/js/image.js') }}"></script>
@endsection
@endsection
@include('ajax.address')
