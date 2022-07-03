@extends('layouts.master')
@section('title')
    Đăng nhập
@endsection
@section('header_CSS')
    {{-- <link rel="stylesheet" href="{{ asset('FrontEnd/assets/css/account_order_style.scss.css') }}" type="text/css"> --}}
@endsection
<style>
    h1,
    .title-head {
        font-size: 19px;
        font-family: "Roboto", sans-serif;
        line-height: 22px;
        font-weight: 400;
        color: #212B25;
        text-transform: uppercase;
        margin-bottom: 27px;
    }
</style>
@section('content')
    @include('layouts.breadcrumb', ['link' => 'Đăng nhập'])


    <div class="container">
        <div class="wrap_background_aside margin-bottom-20">
            <h1 class="title-head"><span>Đăng nhập tài khoản</span></h1>
            <span class="success"></span>
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-login">
                        <div id="login">
                            <span> Nếu bạn đã có tài khoản, đăng nhập tại đây. </span>
                            {{-- <form action="{{ route('loginPost') }}" method="post" accept-charset="utf-8" id="customer_login">
                               @csrf --}}
                            <form>
                                {{-- <input name="FormType" type="hidden" value="customer_login"> --}}
                                {{-- <input name="utf8" type="hidden" value="true"> --}}
                                <div class="form-signup" style="color: red"></div>
                                <div class="form-signup clearfix">
                                    <fieldset class="form-group">
                                        <label>Email <span class="required">*</span></label>
                                        <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$"
                                            class="form-control form-control-lg" value="" name="emailFE" id="emailFE"
                                            placeholder="Email" required="">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label>Mật khẩu <span class="required">*</span></label>
                                        <input type="password" class="form-control form-control-lg" value=""
                                            name="passwordFE" id="passwordFE" placeholder="Mật khẩu" required="">
                                    </fieldset>
                                    <span id="error"></span>
                                    {{-- <div class="g-recaptcha" id="feedback-recaptcha"
                                        data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}">
                                   
                                    </div> --}}
                                    <!-- End Google reCaptcha -->

                                    <div class="pull-xs-left" style="margin-top: 25px">
                                        <input id="loginForm" class="btn btn-style btn-primary" type="submit"
                                            value="Đăng nhập">
                                        <a href="javascript:void(0)" class="RegisterView btn-link-style btn-register"
                                            style="margin-left: 20px; text-decoration: underline">Đăng ký</a>

                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 h_recover">
                    <span id="successForgotPassword"></span>

                    <div id="recover-password" class="form-signup page-login">
                        <span>
                            Bạn quên mật khẩu? Nhập địa chỉ email để lấy lại mật khẩu qua
                            email.
                        </span>
                        <form id="recover_customer_password">
                            {{-- <input name="FormType" type="hidden" value="recover_customer_password">
                            <input name="utf8" type="hidden" value="true"> --}}
                            <div class="form-signup" style="color: red"></div>
                            <div class="form-signup clearfix">
                                <fieldset class="form-group">
                                    <label>Email <span class="required">*</span></label>
                                    <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$"
                                        class="form-control form-control-lg" value="" name="EmailForgot" id="EmailForgot"
                                        placeholder="Email">
                                </fieldset>
                                <span id="errorForgotPassword"></span>

                            </div>
                            <div class="action_bottom">
                                <input class="btn btn-style btn-primary forgotPassword" style="margin-top: 28px"
                                    type="submit" value="Lấy lại mật khẩu">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
