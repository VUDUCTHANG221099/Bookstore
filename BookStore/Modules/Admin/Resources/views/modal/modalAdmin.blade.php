{{-- Admin Get --}}
<div class="modal fade" id="ViewAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Xem thông tin
                </h5>
                <span class="btnClose" style="cursor: pointer">
                    <i class="fa fa-times"></i>
                </span>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group md-3">
                        <label for="ViewAdmin_name">Họ và tên</label>
                        <input type="text" class="form-control" id="ViewAdmin_name" />
                    </div>
                    <div class="form-group md-3">
                        <label for="ViewAdmin_email">Email</label>
                        <input type="email" class="form-control" id="ViewAdmin_email" />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

{{-- Add Admin --}}
<div class="modal fade" id="AddAdmin" tabindex="-1" aria-labelledby="TitleAddAdmin" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TitleAddAdmin">Thêm Admin</h5>
                <span class="btnClose" style="cursor: pointer">
                    <i class="fa fa-times"></i>
                </span>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <span id="successAdd"> </span>
                </div>

                <form>
                    <div class="form-group">
                        <label for="Admin_name">Họ và tên</label>
                        <input type="text" name="Admin_name" class="form-control" id="Admin_name"
                            placeholder="VD: Nguyễn Văn A" />
                    </div>
                    <div class="form-group">
                        <label for="Admin_email">Email</label>
                        <input type="email" name="Admin_email" class="form-control" id="Admin_email"
                            placeholder="VD: name@example.com" />
                    </div>

                    <div class="form-group">
                        <label for="Admin_password">Mật khẩu</label>
                        <input type="password" name="Admin_password" class="form-control" id="Admin_password"
                            placeholder="VD: 123456" />
                    </div>
                    <div class="form-group">
                        <label for="Admin_ConfirmPassword">Xác nhận mật khẩu</label>
                        <input type="password" name="Admin_ConfirmPassword" class="form-control"
                            id="Admin_ConfirmPassword" placeholder="Xác nhận mật khẩu" />
                    </div>
                    <div class="form-group">
                        <span id="error"></span>
                    </div>
                    <button type="submit" class="btn btn-primary add_admin">
                        Save
                    </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

{{-- Update Admin --}}
<div class="modal fade" id="UpdateAdmin" tabindex="-1" aria-labelledby="TitleUpdateAdmin" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TitleUpdateAdmin">
                    Cập nhật thông tin Admin
                </h5>
                <span class="btnClose" style="cursor: pointer">
                    <i class="fa fa-times"></i>
                </span>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <span id="successUpdate"> </span>
                </div>

                <form>
                    <input type="hidden" id="id_admin" />
                    <div class="form-group">
                        <label for="Admin_name_update">Họ và tên</label>
                        <input type="text" name="Admin_name_update" class="form-control" id="Admin_name_update"
                            placeholder="VD: Nguyễn Văn A" />
                    </div>
                    <div class="form-group">
                        <label for="Admin_email">Email</label>
                        <input type="email" name="Admin_email_update" class="form-control" id="Admin_email_update"
                            placeholder="VD: name@example.com" disabled />
                    </div>

                    <button type="submit" class="btn btn-primary Update_admin">
                        Save
                    </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

{{-- Remove Admin --}}
<div class="modal fade" id="RemoveAdmin" tabindex="-1" aria-labelledby="Remove" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p></p>

                <span class="btnClose" style="cursor: pointer">
                    <i class="fa fa-times"></i>
                </span>
            </div>
            <div class="form-group">
                <span id="destroyAdmin"></span>
            </div>
            <div class="modal-body">
                <h1 class="text-center">Bạn có muốn xóa không?</h1>
                <div style="text-align: center;">

                    <button type="submit" class="btn btn-danger m-2" style="font-size:25px"  id="YesRemoveAdmin">
                        Yes
                    </button>
                    <button type="submit" class="btn btn-primary m-2" style="font-size:25px" id="NoRemoveAdmin">
                        No
                    </button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

{{-- Not Remove --}}
<div class="modal fade" id="NotUserLogin" tabindex="-1" aria-labelledby="Remove" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p></p>

                <span class="btnClose" style="cursor: pointer">
                    <i class="fa fa-times"></i>
                </span>
            </div>
            
            <div class="modal-body">
                <h3 class="text-center" style="font-size:20px">Tài khoản này không được xóa</h3>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
