{{-- Customer Get --}}
<div class="modal fade" id="ViewCustomer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <label for="ViewCustomer_name">Họ và tên</label>
                        <input type="text" class="form-control" id="ViewCustomer_name" />
                    </div>
                    <div class="form-group md-3">
                        <label for="ViewCustomer_email">Email</label>
                        <input type="email" class="form-control" id="ViewCustomer_email" />
                    </div>
                    <div class="form-group md-3">
                        <label for="ViewCustomer_phone">Số điện thoại</label>
                        <input type="text" class="form-control" id="ViewCustomer_phone" />
                    </div>
                    <div class="form-group md-3">
                        <label for="ViewCustomer_address">Địa chỉ</label>
                        <textarea type="text" class="form-control" id="ViewCustomer_address">
                        </textarea>
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

<div class="modal fade" id="RemoveCustomer" tabindex="-1" aria-labelledby="Remove" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p></p>

                <span class="btnClose" style="cursor: pointer">
                    <i class="fa fa-times"></i>
                </span>
            </div>
            <div class="form-group">
                <span id="destroyCustomer"></span>
            </div>
            <div class="modal-body text-center">
                <h1>Bạn có muốn xóa không?</h1>
                <button type="submit" class="btn btn-danger m-2" style="font-size:25px"  id="YesRemoveCustomer">
                    Yes
                </button>
                <button type="submit" class="btn btn-primary m-2" style="font-size:25px"  id="NoRemoveCustomer">
                    No
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>