@extends('layouts.master')

@section('title')
    Đăng ký thành viên mới
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
@include('layouts.breadcrumb', ['link' => 'Đăng ký tài khoản'])


    <div class="container">
        <div class="wrap_background_aside margin-bottom-20">
            <h1 class="title-head">Đăng ký tài khoản</h1>
            <span class="success"></span>

            <div class="page-login">
                <div id="login">
                    <form id="customer_register">
                        {{-- <input name="FormType" type="hidden" value="customer_register" />
            <input name="utf8" type="hidden" value="true" /> --}}

                        <div class="form-signup"></div>
                        <div class="form-signup clearfix">
                            <div class="row">
                                <div class="col-md-6">
                                    <fieldset class="form-group">
                                        <label>Họ và tên:</label>
                                        <input type="text" class="form-control form-control-lg" value=""
                                            name="RegisterfullnameFE" id="RegisterfullnameFE" placeholder="VD: Nguyễn Văn A"
                                            required="" />
                                    </fieldset>
                                </div>
                                <div class="col-md-6">
                                    <fieldset class="form-group">
                                        <label>Email:</label>
                                        <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$"
                                            class="form-control form-control-lg" value="" name="RegisterEmailFE"
                                            id="RegisterEmailFE" placeholder="VD:  thanglong@gmail.com" required="" />
                                    </fieldset>
                                    <span class="error"></span>

                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <fieldset class="form-group">
                                        <label>Mật khẩu:</label>
                                        <input type="password" class="form-control form-control-lg" value=""
                                            name="RegisterPasswordFE" id="RegisterPasswordFE" placeholder="" required="" />
                                    </fieldset>
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <fieldset class="form-group">
                                        <label>Nhập lại mật khẩu:</label>
                                        <input type="password" class="form-control form-control-lg" value=""
                                            name="RegisterConfirmPassFE" id="RegisterConfirmPassFE" placeholder=""
                                            required="" />
                                    </fieldset>
                                </div>
                            </div>

                            <div class="col-xs-12 text-xs-left" style="margin-top: 30px; padding: 0">
                                <button type="submit" value="Đăng ký" class="btn btn-style btn-primary" id="registerForm">
                                    Đăng ký
                                </button>
                                <a href="javascript:void(0)" class="loginView btn-link-style btn-register"
                                    style="margin-left: 20px; text-decoration: underline">Đăng nhập</a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
