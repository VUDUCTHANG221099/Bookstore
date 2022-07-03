@extends('layouts.master')
@section('title')
    Quên mật khẩu
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
    @include('layouts.breadcrumb', ['link' => 'Quên mật khẩu'])

    <section>
        <div class="wrap_background_aside padding-top-15 margin-bottom-40">
            <div class="row">
                <div class="container">
                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-xs-12">
                        <span class="success"></span>
                        <div id="col-main" class="clearfix margin-bottom-30">
                            <h1 class="title-head">Lấy lại mật khẩu</h1>
                            <div id="reset_password" class="row-fluid">
                                <div class="span6">
                                    <p class="note">Nhập mật khẩu mới</p>
                                    <form  id="reset_customer_password"
                                        >
                                        {{-- @csrf action="{{route('Postreset_password')}}" --}}
                                        <input type="hidden" value="{{request()->get('email')}}" name="email">
                                        {{-- <input name="FormType" type="hidden" value="reset_customer_password">
                                        <input name="utf8" type="hidden" value="true"> --}}

                                        <div class="form-signup success hidden" style="color: green;">
                                            Đổi mật khẩu thành công
                                        </div>

                                        <div id="customer_password" class="form-group clearfix">
                                            <label class="control-label">Mật khẩu <span
                                                    class="required">*</span></label>
                                            <input type="password" value="" name="Password" id="Password"
                                                class="form-control">
                                        </div>
                                        <div id="password_confirm" class="form-group clearfix">
                                            <label class="control-label">Xác nhận mật khẩu <span
                                                    class="required">*</span></label>
                                            <input type="password" value="" name="ConfirmPassword"
                                                id="ConfirmPassword" class="form-control">
                                        </div>
                                        <div class="others-bottom">
                                            <button class="btn btn-primary f-left left" id="ForgotPassword" type="submit"
                                                style="float: left; margin-right: 10px">Đặt lại mật khẩu</button>
                                            <a class="btn btn-link-style margin-left-10 f-left a-left  home"
                                                href="javascript:void(0)" style="
                                                    line-height: 38px;text-decoration: underline;
                                                    ">Hủy</a>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
