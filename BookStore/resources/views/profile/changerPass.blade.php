 <!--Đổi mật khẩu-->
 <div class="col-xs-12 col-sm-12 col-lg-9 col-right-ac change_password">
    <h1 class="title-head margin-top-0">Đổi mật khẩu</h1>
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="page-login">
                <span class="success"></span>

                {{-- <form accept-charset="utf-8" action="/account/changepassword"
                    id="change_customer_password" method="post"> --}}
                <form>
                    <p>
                        Để đảm bảo tính bảo mật vui lòng đặt mật khẩu với ít nhất 6 kí tự
                    </p>



                    <div class="form-signup clearfix">
                        <fieldset class="form-group">
                            <label for="OldPasswordFE">Mật khẩu cũ <span>*</span></label>
                            <input type="password" name="OldPasswordFE" id="OldPasswordFE" required=""
                                value="" class="form-control form-control-lg">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="NewPasswordFE">Mật khẩu mới <span>*</span></label>
                            <input type="password" name="NewPasswordFE" id="NewPasswordFE" required=""
                                value="" class="form-control form-control-lg">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="confirmPassFE">Xác nhận lại mật khẩu <span>*</span></label>
                            <input type="password" name="confirmPassFE" id="confirmPassFE" required=""
                                value="" class="form-control form-control-lg">
                        </fieldset>

                        <button type="submit" class="button btn-edit-addr btn btn-primary btn-more"
                            id="changePasswordFE">
                            <i class="hoverButton"></i>Đặt lại mật khẩu</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!--Đổi mật khẩu-->
