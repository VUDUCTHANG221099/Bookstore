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
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

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
        @endsection
        @include('layouts.breadcrumb', ['link' => 'Bài viết'])
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
                        {{-- <li>
                            <a class="title-info my_orderView" href="javascript:void()">Đơn hàng của bạn</a>
                        </li> --}}
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

          {{-- @include('profile.order') --}}

            {{-- @endif --}}

           @include('profile.changerPass')


            @include('profile.address')

            @include('profile.post')

        </div>
    </div>
</section>
@section('footer_JS')
<script src="{{asset('assets/datatables/js/jquery.dataTables.min.js')}}"></script>

    <script src="{{ asset('assets/upload/js/image.js') }}"></script>
@endsection
@endsection
    
@include('ajax.address')
