

{{-- Add Pay --}}
<div class="modal fade" id="AddPay" tabindex="-1" aria-labelledby="Payment" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Payment">Thêm phương thức thanh toán</h5>
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
                        <label for="payment_name">Phương thức thanh toán</label>
                        <input type="text" name="payment_name" class="form-control" id="payment_name"
                            placeholder="VD: Thanh toán qua ngân hàng" />
                    </div>
                    <div class="form-group">
                        <span id="error"></span>
                    </div>
                    <button type="submit" class="btn btn-primary add_pay">
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

{{-- Update Pay --}}
<div class="modal fade" id="UpdatePay" tabindex="-1" aria-labelledby="Payment_update" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Payment_update">Cập nhật phương thức thanh toán</h5>
                <span class="btnClose" style="cursor: pointer">
                    <i class="fa fa-times"></i>
                </span>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <span id="successUpdate"> </span>
                </div>

                <form>
                    <input type="hidden" id="id_payment" name="id_payment" />

                    <div class="form-group">
                        <label for="payment_name_Update">Phương thức thanh toán</label>
                        <input type="text" name="payment_name" class="form-control" id="payment_name_Update"
                            placeholder="VD: Thanh toán qua ngân hàng" />
                    </div>
                    <div class="form-group">
                        <span id="errorPay"></span>
                    </div>
                    <button type="submit" class="btn btn-primary update_pay">
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

{{-- Add Pay --}}
<div class="modal fade" id="ViewPay" tabindex="-1" aria-labelledby="Payment" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Payment">Xem phương thức thanh toán</h5>
                <span class="btnClose" style="cursor: pointer">
                    <i class="fa fa-times"></i>
                </span>
            </div>
            <div class="modal-body">
                {{-- <div class="form-group">
                    <span id="successAdd"> </span>
                </div> --}}

                <form>
                    <div class="form-group">
                        <label for="payment_name_View">Phương thức thanh toán</label>
                        <input type="text" name="payment_name" class="form-control" id="payment_name_View"
                            placeholder="VD: Thanh toán qua ngân hàng" />
                    </div>
                    <div class="form-group">
                        <span id="error"></span>
                    </div>
                    {{-- <button type="submit" class="btn btn-primary add_pay">
                        Save
                    </button> --}}
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
<div class="modal fade" id="RemovePay" tabindex="-1" aria-labelledby="Remove" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p></p>

                <span class="btnClose" style="cursor: pointer">
                    <i class="fa fa-times"></i>
                </span>
            </div>
            <div class="form-group">
                <span id="destroyPay"></span>
            </div>
            <div class="modal-body">
                <h1 class="text-center">Bạn có muốn xóa không?</h1>
                <div style="text-align: center;">

                    <button type="submit" class="btn btn-danger m-2" style="font-size:25px"  id="YesRemovePay">
                        Yes
                    </button>
                    <button type="submit" class="btn btn-primary m-2" style="font-size:25px" id="NoRemovePay">
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


