<div class="modal fade" id="Profile" tabindex="-1" aria-labelledby="admin_Profile" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="admin_Profile">
                    Cập nhật thông tin
                </h5>
                <span class="btnClose" style="cursor: pointer">
                    <i class="fa fa-times"></i>
                </span>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <span id="success"> </span>
                </div>
                {{-- <form method="post" action="{{ route('profile') }}">
                    @csrf --}}
                <form>
                    
                    <div class="form-group">
                        <input type="hidden" id="id_profile" name="id_profile">
                        <label for="admin_name_profile">Họ và tên</label>
                        <input type="text" name="admin_name_profile" class="form-control" id="admin_name_profile"
                            placeholder="VD: Nguyễn Văn A" />
                    </div>
                    <div class="form-group">
                        <label for="password_new">Mật khẩu mới</label>
                        <input type="password" name="password_new" class="form-control" id="password_new"
                            placeholder="Mật khẩu mới" />
                    </div>
                    <div class="form-group">
                        <label for="confirm_password_new">Xác nhận mật khẩu</label>
                        <input type="password" name="confirm_password_new" class="form-control" id="confirm_password_new"
                            placeholder="Mật khẩu" />
                    </div>
                    

                    <button type="submit" class="btn btn-primary" id="profile">
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