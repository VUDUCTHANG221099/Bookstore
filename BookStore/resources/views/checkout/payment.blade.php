<div class="col col--two">
    <section class="section">
        <div class="section__header">
            <div class="layout-flex">
                <h2 class="section__title layout-flex__item layout-flex__item--stretch">
                    <i class="fa fa-credit-card fa-lg section__title--icon hide-on-desktop"></i>
                    Thanh toán
                </h2>
            </div>
        </div>
        <div class="section__content">
            <div class="content-box">
                <div class="content-box__row">
                    <div class="radio-wrapper">
                        <div class="radio__input">
                            <input name="paymentMethod" id="COD" type="radio" class="input-radio"
                                data-bind="paymentMethod" value="0"  />
                        </div>
                        <label for="COD" class="radio__label">
                            <span class="radio__label__primary">Thanh toán khi giao hàng (COD)</span>
                            <span class="radio__label__accessory">
                                <span class="radio__label__icon">
                                    <i class="payment-icon payment-icon--4"></i>
                                </span>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="content-box__row">
                    <div class="radio-wrapper">
                        <div class="radio__input">
                            <input name="paymentMethod" id="vnpay" type="radio" class="input-radio"
                                data-bind="paymentMethod" value="1" />
                                
                        </div>
                        <label for="vnpay" class="radio__label">
                            <span class="radio__label__primary">Thanh toán qua VNPAY</span>
                            <span class="radio__label__accessory">
                                <span class="radio__label__icon">
                                    <i class="payment-icon payment-icon--16"></i>
                                </span>
                            </span>
                        </label>
                    </div>

                    <div class="content-box__row__desc" style="display: none">
                        {{-- <div class="form-group">
                            <label for="language">Loại hàng hóa </label>
                            <select name="order_type" id="order_type" class="form-control">
                                <option value="topup">Nạp tiền điện thoại</option>
                                <option value="billpayment">Thanh toán hóa đơn</option>
                                <option value="fashion">Thời trang</option>
                                <option value="other">Khác - Xem thêm tại VNPAY</option>
                            </select>
                        </div> --}}

                        <div class="field field--show-floating-label ">
                            <div class="field__input-wrapper field__input-wrapper--select2">
                                <label for="order_type" class="field__label">
                                    Loại hàng hóa
                                </label>

                                <select name="order_type" id="order_type" size="1" type="text" class=" "
                                    value="" data-address-type="order_type">
                                    <option value="" hidden>Xin mời chọn</option>
                                    <option value="topup">Nạp tiền điện thoại</option>
                                    <option value="billpayment">Thanh toán hóa đơn</option>
                                    <option value="fashion">Thời trang</option>
                                    <option value="other">Khác</option>

                                </select>

                                <span  class="err-order_type">
                                    
                                </span>
                            </div>

                        </div>

                        <div class="form-group" style="display: none">
                            <label for="order_id">Mã hóa đơn</label>
                            <input class="form-control" id="order_id" name="order_id" type="text"
                                value="<?php echo date('YmdHis'); ?>" />
                        </div>
                        {{-- <div class="form-group">
                            <label for="amount">Số tiền</label>
                            <input class="form-control" id="amount" name="amount" type="number"
                                value="{{ $total }}" />
                        </div> --}}
                        <div class="field " data-bind-class="{'field--show-floating-label': amount}">
                            <div class="field__input-wrapper">
                                <label for="amount" class="field__label">Số tiền</label>
                                <input name="amount" id="amount" type="text" class="field__input" data-bind="amount"
                                    value="{{ number_format($total) }}" disabled>
                                <input name="amount" type="hidden" class="field__input" value="{{ $total }}">
                            </div>

                        </div>

                        {{-- <div class="form-group">
                            <label for="order_desc">Nội dung thanh toán</label>
                            <textarea class="form-control" cols="20" id="order_desc" name="order_desc" rows="2"></textarea>
                        </div> --}}
                        <div class="fieldset">
                            <h3 class="visually-hidden">Nội dung thanh toán</h3>
                            <div class="field " data-bind-class="{'field--show-floating-label': order_desc}">
                                <div class="field__input-wrapper">
                                    <label for="order_desc" class="field__label">
                                        Nội dung thanh toán
                                    </label>
                                    <textarea name="order_desc" id="order_desc" type="text" class="field__input" data-bind="order_desc">Thanh toán mua sách {{ $datetime }}
                                </textarea>
                                </div>

                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label for="bank_code">Ngân hàng</label>
                            <select name="bank_code" id="bank_code" class="form-control">
                                <option value="">Không chọn</option>
                                <option value="NCB"> Ngan hang NCB</option>
                                <option value="AGRIBANK"> Ngan hang Agribank</option>
                                <option value="SCB"> Ngan hang SCB</option>
                                <option value="SACOMBANK">Ngan hang SacomBank</option>
                                <option value="EXIMBANK"> Ngan hang EximBank</option>
                                <option value="MSBANK"> Ngan hang MSBANK</option>
                                <option value="NAMABANK"> Ngan hang NamABank</option>
                                <option value="VNMART"> Vi dien tu VnMart</option>
                                <option value="VIETINBANK">Ngan hang Vietinbank</option>
                                <option value="VIETCOMBANK"> Ngan hang VCB</option>
                                <option value="HDBANK">Ngan hang HDBank</option>
                                <option value="DONGABANK"> Ngan hang Dong A</option>
                                <option value="TPBANK"> Ngân hàng TPBank</option>
                                <option value="OJB"> Ngân hàng OceanBank</option>
                                <option value="BIDV"> Ngân hàng BIDV</option>
                                <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                                <option value="VPBANK"> Ngan hang VPBank</option>
                                <option value="MBBANK"> Ngan hang MBBank</option>
                                <option value="ACB"> Ngan hang ACB</option>
                                <option value="OCB"> Ngan hang OCB</option>
                                <option value="IVB"> Ngan hang IVB</option>
                                <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                            </select>
                        </div> --}}

                        {{-- <div class="form-group">
                            <label for="language">Ngôn ngữ</label>
                            <select name="language" id="language" class="form-control">
                                <option value="vn">Tiếng Việt</option>
                                <option value="en">English</option>
                            </select>
                        </div> --}}

                        <div class="field field--show-floating-label ">
                            <div class="field__input-wrapper field__input-wrapper--select2">
                                <label for="bank_code" class="field__label">
                                    Ngân hàng
                                </label>
                                <select name="bank_code" id="bank_code" size="1" type="text" class=" "
                                    value="" data-address-type="bank_code">
                                    <option value="">Không chọn</option>
                                    <option value="NCB"> Ngan hang NCB</option>
                                    <option value="AGRIBANK"> Ngan hang Agribank</option>
                                    <option value="SCB"> Ngan hang SCB</option>
                                    <option value="SACOMBANK">Ngan hang SacomBank</option>
                                    <option value="EXIMBANK"> Ngan hang EximBank</option>
                                    <option value="MSBANK"> Ngan hang MSBANK</option>
                                    <option value="NAMABANK"> Ngan hang NamABank</option>
                                    <option value="VNMART"> Vi dien tu VnMart</option>
                                    <option value="VIETINBANK">Ngan hang Vietinbank</option>
                                    <option value="VIETCOMBANK"> Ngan hang VCB</option>
                                    <option value="HDBANK">Ngan hang HDBank</option>
                                    <option value="DONGABANK"> Ngan hang Dong A</option>
                                    <option value="TPBANK"> Ngân hàng TPBank</option>
                                    <option value="OJB"> Ngân hàng OceanBank</option>
                                    <option value="BIDV"> Ngân hàng BIDV</option>
                                    <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                                    <option value="VPBANK"> Ngan hang VPBank</option>
                                    <option value="MBBANK"> Ngan hang MBBank</option>
                                    <option value="ACB"> Ngan hang ACB</option>
                                    <option value="OCB"> Ngan hang OCB</option>
                                    <option value="IVB"> Ngan hang IVB</option>
                                    <option value="VISA"> Thanh toan qua VISA/MASTER</option>

                                </select>

                            </div>

                        </div>
                        <div class="field field--show-floating-label ">
                            <div class="field__input-wrapper field__input-wrapper--select2">
                                <label for="language" class="field__label">
                                    Ngôn ngữ
                                </label>
                                <select name="language" id="language" size="1" type="text" class=" "
                                    value="" data-address-type="language">
                                    <option value="vn">Tiếng Việt</option>
                                    <option value="en">English</option>

                                </select>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <span class="CheckMethodPay">

                @if ($errors->any())
                    {!! $errors->first('paymentMethod') !!}
                    {{-- {!! $errors->first('shipper') !!} --}}
                @endif
            </span>
            
        </div>



    </section>
    <section class="section" >
        <div class="section__header">
            <div class="layout-flex">
                <h2 class="section__title layout-flex__item layout-flex__item--stretch">
                    <i class="fa fa-credit-card fa-lg section__title--icon hide-on-desktop"></i>
                    Đơn vị vận chuyển
                </h2>
            </div>
        </div>
        <div class="section__content">
            <div class="content-box">
                @if (isset($shipper) and count($shipper) > 0)
                    @foreach ($shipper as $item)
                        <div class="content-box__row">
                            <div class="radio-wrapper">
                                <div class="radio__input">
                                    <input name="shipper" id="{{ $item->slug }}" type="radio" class="input_shipper"
                                        data-bind="shipper" value="{{ $item->id }}" />
                                </div>
                                <label for="{{ $item->slug }}" class="radio__label">
                                    <span class="radio__label__primary">{{ $item->shipper_name }}</span>

                                </label>
                            </div>
                        </div>
                    @endforeach
                    
                    @endif
                    
                </div>
                <span class="checkShipper">

                    @if ($errors->any())
                        {{-- {!! $errors->first('order_type') !!} --}}
                        {!! $errors->first('shipper') !!}
                    @endif
                </span>
        </div>
       


    </section>
    <div class="field__input-btn-wrapper field__input-btn-wrapper--vertical hide-on-desktop">
        <button type="submit" class="btn btn-checkout spinner" name="redirect">
            <span class="spinner-label">ĐẶT HÀNG</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="spinner-loader">
                <use href="#spinner"></use>
            </svg>
        </button>

    </div>
</div>


<link href="https://sandbox.vnpayment.vn/paymentv2/lib/vnpay/vnpay.css" rel="stylesheet" />
<script src="https://sandbox.vnpayment.vn/paymentv2/lib/vnpay/vnpay.js"></script>
