<div class="main container hidden-xs">
    <div class="wrap_background_aside padding-top-15 margin-bottom-40">
        <div class="header-cart">
            <h1 class="title_cart">
                <a href="">Giỏ hàng của bạn <span>(<span
                            class="cart-popup-count">{{ isset($quantity) ? $quantity : 0 }}</span> sản phẩm)</span></a>
            </h1>
            <div class="header-cart title_cart_pc hidden-sm hidden-xs">

            </div>
        </div>
        @if (isset($carts) and  $carts=="[]")
            <div class="col-main cart_desktop_page cart-page">
                <p>Không có sản phẩm nào trong giỏ hàng. Quay lại <a href="{{ route('book') }}">cửa hàng</a> để tiếp
                    tục
                    mua sắm.</p>
            </div>
        @else
            <div class="col-main cart_desktop_page cart-page">
                @if (isset($carts) and count($carts) > 0)
                    <div class="cart page_cart cart_des_page hidden-xs-down">

                        <div class="bg-scroll">
                            <div class="cart-thead">
                                <div class="" style="width: 43%"><span>Sản phẩm<span></span></span></div>
                                <div style="width: 20%" class="a-center"><span class="nobr">Giá</span>
                                </div>
                                <div style="width: 15%" class="a-center">Số lượng</div>
                                <div style="width: 22%" class="a-center">Thành tiền</div>
                            </div>
                            <div class="cart-tbody update-web" data-url-update-web="{{ route('updateCart') }}">
                                @foreach ($carts as $book)
                                    <div class="item-cart">
                                        <div class="content_ content_s" style="width: 15%">
                                            <a class="product-image" title="{{ $book->book_name }}"
                                                href="{{ route('bookDetailsFE', ['book_slug' => $book->slug]) }}"><img
                                                    width="75" height="auto" alt="{{ $book->book_name }}"
                                                    src="{{ isset($book->image) ? asset('images/book/' . $book->image) : asset('images/default.jpg') }}"></a>
                                        </div>
                                        <div class="content_ content_s" style="width: 28%">
                                            <h3 class="product-name"> <a
                                                    href="{{ route('bookDetailsFE', ['book_slug' => $book->slug]) }}"
                                                    title="{{ $book->book_name }}">{{ $book->book_name }}</a> </h3>
                                            <span class="variant-title"></span><a
                                                class="button remove-item remove-item-cart remove-item-cart-web"
                                                title="Xoá bỏ" href="javascript:;"
                                                data-url-web-delete="{{ route('deleteCart', ['id' => $book->id_book]) }}"><i
                                                    class="fa fa-trash" aria-hidden="true"></i> Xóa bỏ</a>
                                        </div>
                                        <div style="width: 20%" class="a-center"><span class="item-price">
                                                <span
                                                    class="price bold-price">{{ number_format($book->price-3000) }}₫</span></span>
                                        </div>
                                        <div style="width: 15%" class="a-center">
                                            @php
                                                $CartWebIdBook = "CartWeb$book->id_book";
                                            @endphp
                                            <div class="input_qty_pr">
                                                <input class="variantID" type="hidden" name="variantId">
                                                <button onclick="var result = document.getElementById('{{ $CartWebIdBook }}');
                                                var {{ $CartWebIdBook }} = result.value;
                                                if( !isNaN( {{ $CartWebIdBook }} ) && {{ $CartWebIdBook }} > 1 )
                                                result.value--;return false;"
                                                    class="reduced_pop items-count btn-minus btn-minus-web btn-web-cart"
                                                    type="button" data-id-minus-cart-web="{{ $CartWebIdBook }}"
                                                    data-id-minus-book-web="{{ $book->id_book }}">–</button>
                                                <input type="text" maxlength="3" min="0"
                                                    class="input-text number-sidebar 
                                                input_pop input_pop {{ $CartWebIdBook }}"
                                                    readonly id="{{ $CartWebIdBook }}" name="Lines" size="4"
                                                    value="{{ $book->quantity }}">
                                                <button onclick="var result = document.getElementById('{{ $CartWebIdBook }}');
                                                var {{ $CartWebIdBook }} = result.value;
                                                if( !isNaN( {{ $CartWebIdBook }} )) result.value++;return false;"
                                                    class="increase_pop items-count btn-plus btn-plus-web btn-web-cart"
                                                    type="button" data-id-plus-cart-web="{{ $CartWebIdBook }}"
                                                    data-id-plus-book-web="{{ $book->id_book }}">+</button>
                                            </div>
                                        </div>
                                        <div style="width: 22%" class="a-center"><span
                                                class="item-price cart-price">
                                                <span
                                                    class="price pink">{{ number_format(($book->price -3000)* $book->quantity) }}₫</span>
                                            </span></div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        {{-- @if (isset($carts) and count($cart) > 0) --}}

                        <div class="cart-collaterals cart_submit">
                            <div class="totals">
                                <div class="totals">
                                    <div class="inner">
                                        <div class="wrap_checkprice">
                                            <div class="li_table shopping-cart-table-total hidden"><span
                                                    class="li-left">Tạm tính:</span><span
                                                    class="li-right totals_price price pink">{{ number_format($total) }}₫</span>
                                            </div>
                                            <div class="li_table shopping-cart-table-total text-right"><span
                                                    class="li_text">Thành tiền : </span><span
                                                    class="totals_price price">{{ number_format($total) }}₫</span>
                                            </div>
                                            <div class="btn_bottom"
                                                onclick="window.location.href='{{ route('book') }}'"><a
                                                    href="{{ route('book') }}" class="button btn-continue"
                                                    title="Tiếp tục mua hàng"><span><span>Tiếp tục mua
                                                            hàng</span></span></a>
                                            </div>
                                            <div class="wrap_btn"><a class="button btn-proceed-checkout"
                                                    title="Tiến hành thanh toán" type="button"
                                                    onclick="window.location.href='{{ route('checkout', ['token' => session()->get('book_token')]) }}'"><span>Tiến
                                                        hành thanh
                                                        toán


                                                    </span></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
        @endif
    </div>


</div>
</div>
