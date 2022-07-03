{{-- Category Get --}}
<div class="modal fade" id="ViewCate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <label for="ViewCategory_name">Thể loại</label>
                        <input type="text" class="form-control" id="ViewCategory_name" />
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

{{-- Add Category --}}
<div class="modal fade" id="AddCate" tabindex="-1" aria-labelledby="TitleAddCate" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TitleAddCate">Thêm thể loại</h5>
                <span class="btnClose" style="cursor: pointer">
                    <i class="fa fa-times"></i>
                </span>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <span id="successCate"> </span>
                </div>

                <form>
                    <div class="form-group">
                        <label for="Category_name">Thể loại</label>
                        <input type="text" name="Category_name" class="form-control" id="Category_name"
                            placeholder="VD: Sách thiếu nhi" />
                    </div>

                    <div class="form-group">
                        <span id="error"></span>
                    </div>
                    <button type="submit" class="btn btn-primary add_cate">
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

{{-- Update Category --}}
<div class="modal fade" id="UpdateCate" tabindex="-1" aria-labelledby="TitleUpdateCate" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TitleUpdateCate">
                    Cập nhật thể loại
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
                    <input type="hidden" id="slug_category" />
                    <div class="form-group">
                        <label for="Cate_name_update">Thể loại</label>
                        <input type="text" name="Cate_name_update" class="form-control" id="Cate_name_update"
                            placeholder="VD: Sách thiếu nhi" />
                    </div>
                    <div class="form-group">
                        <span id="errorCate"></span>
                    </div>

                    <button type="submit" class="btn btn-primary Update_cate">
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

{{-- Remove Category --}}
<div class="modal fade" id="RemoveCate" tabindex="-1" aria-labelledby="Remove" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p></p>

                <span class="btnClose" style="cursor: pointer">
                    <i class="fa fa-times"></i>
                </span>
            </div>
            <div class="form-group">
                <span id="destroyCate"></span>
            </div>
            <div class="modal-body">
                <h1 class="text-center">Bạn có muốn xóa không?</h1>
                <div style="text-align: center;">

                    <button type="submit" class="btn btn-danger m-2" style="font-size:25px"  id="YesRemoveCategory">
                        Yes
                    </button>
                    <button type="submit" class="btn btn-primary m-2" style="font-size:25px" id="NoRemoveCategory">
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
