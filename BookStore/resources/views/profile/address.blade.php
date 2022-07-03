<!--Địa chỉ-->
<div class="col-xs-12 col-sm-12 col-lg-9 col-right-ac my_address">

    <h1 class="title-head">Địa chỉ của bạn</h1>
    <p class="btn-row">
        <button class="btn-edit-addr btn btn-primary btn-more" id="Addaddress">Thêm địa chỉ</button>

    </p>


    <div class="row total_address">


        <div id="view_address" class="customer_address col-xs-12 col-lg-12 col-md-12 col-xl-12">
            @if (isset($address) and count($address) > 0)
                @foreach ($address as $item)
                    <div class="address_info"
                        style="border-top: 1px #ebebeb solid;padding-top: 16px;margin-top: 20px;">
                        <div class="address-group">
                            <div class="address form-signup">
                                <p><strong>Số điện thoại: </strong>
                                    {{ $item->phone }}
                                    @if ($item->status == 1)
                                        <span class="address-default"><i class="far fa-check-circle"></i>Địa
                                            chỉ
                                            mặc
                                            định
                                        </span>
                                    @endif
                                    <!--check-->
                                </p>
                                <p>
                                    <strong>Địa chỉ: </strong>
                                    {{ $item->address }}
                                </p>


                            </div>
                        </div>
                        <div id="tool_address" class="btn-address">
                            <p class="btn-row">
                                <button class="btn-edit-addr btn btn-primary btn-edit"
                                    value="{{ $item->id }}">
                                    Chỉnh sửa địa chỉ
                                </button>
                                <button value="{{ $item->id }}"
                                    class="{{ $item->status == 1 ? 'hidden' : false }} btn btn-dark-address btn-edit-addr btn-delete">Xóa</button>
                            </p>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>

    </div>


</div>
<!--Địa chỉ-->
