{{-- Ads Get --}}
<div class="modal fade" id="Viewship" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Đơn vị vận chuyển
                </h5>
                <span class="btnClose" style="cursor: pointer">
                    <i class="fa fa-times"></i>
                </span>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group md-3">
                        <label for="shipper">Đơn vị vận chuyển</label>
                        <input type="text" class="form-control" id="shipper"
                        placeholder="VD: J&T Express" />
                    </div>
                    <div class="form-group md-3 showOfhide" >
                        <div class="uploader">
                            <input id="file-upload" type="file" name="logo" accept="*"
                                 />
                            <label for="file-upload" id="file-drag">
                                <img id="file-image" 
                                    alt="Preview" class="">
                                <div id="start" class="hidden">
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                    <div>Hình ảnh minh họa</div>
                                    <div id="notimage" class="hidden">Please select an image</div>
                                    <span id="file-upload-btn" class="btn btn-primary">send images</span>
                                </div>
                                <div id="response" class="hidden">
                                    <div id="messages"></div>
                                    <progress class="progress" id="file-progress" value="0">
                                        <span>0</span>%
                                    </progress>
                                </div>
                            </label>
        
                        </div>
                           

                        
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



{{-- Remove Admin --}}
<div class="modal fade" id="RemoveShipper" tabindex="-1" aria-labelledby="Remove" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p></p>

                <span class="btnClose" style="cursor: pointer">
                    <i class="fa fa-times"></i>
                </span>
            </div>
            <div class="form-group">
                <span id="destroyShipper"></span>
            </div>
            <div class="modal-body">
                <h1 class="text-center">Bạn có muốn xóa không?</h1>
                <div style="text-align: center;">

                    <button type="submit" class="btn btn-danger m-2" style="font-size:25px" id="YesRemoveShipper">
                        Yes
                    </button>
                    <button type="submit" class="btn btn-primary m-2" style="font-size:25px" id="NoRemoveShipper">
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



