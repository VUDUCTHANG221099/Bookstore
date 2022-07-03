<div class="wrap_background_aside padding-top-15 padding-left-0 padding-right-0 hidden-md hidden-lg hidden-sm">
    <div class="cart-mobile">


        @if (isset($carts) and $carts == '[]')
            <div class="header-cart">

                <div class="title-cart">
                    <h3>Giỏ hàng của bạn</h3>
                    <p>(Chưa có sản phẩm nào) nhấn vào <a href="{{ route('book') }}">cửa hàng</a> để mua hàng</p>
                </div>

            </div>
        @else
            <div class="header-cart update-mobile" data-url-update-mobile="{{ route('updateCart') }}">
                <div class="title-cart title_cart_mobile">
                    <h3>Giỏ hàng của bạn</h3>
                </div>
            </div>

            @if (isset($carts) and count($carts) > 0)
                @foreach ($carts as $book)
                    <div class="header-cart-content" style="background:#fff;">
                        <div class="cart_page_mobile content-product-list">
                            <div class="item-product item">
                                <div class="item-product-cart-mobile">
                                    <a href="{{ route('bookDetailsFE', ['book_slug' => $book->slug]) }}"> </a>
                                    <a class="product-images1"
                                        href="{{ route('bookDetailsFE', ['book_slug' => $book->slug]) }}"
                                        title="{{ $book->book_name }}">
                                        <img width="80" height="150"
                                            src="{{ isset($book->image) ? asset('images/book/' . $book->image) : asset('images/default.jpg') }}"
                                            alt="{{ $book->book_name }}"></a>
                                </div>
                                <div class="title-product-cart-mobile">
                                    <h3><a href="{{ route('bookDetailsFE', ['book_slug' => $book->slug]) }}"
                                            title="{{ $book->book_name }}">{{ $book->book_name }}</a></h3>
                                    <p>Giá: <span>{{ number_format($book->price-3000) }}₫</span></p>
                                </div>
                                <div class="select-item-qty-mobile">
                                    @php
                                    $CartMobileIdBook = "CartMobile$book->id_book";
                                @endphp
                                    <div class="txt_center">
                                        <input class="variantID" type="hidden" name="variantId">
                                        <button onclick="var result = document.getElementById('{{$CartMobileIdBook}}'); 
                                        var {{$CartMobileIdBook}} = result.value; 
                                        if( !isNaN( {{$CartMobileIdBook}} ) && {{$CartMobileIdBook}} > 1 ) result.value--;return false;"
                                            class="reduced items-count btn-minus btn-minus-mobile btn-mobile-cart" type="button"
                                            data-id-minus-cart-mobile="{{ $CartMobileIdBook }}"
                                            data-id-minus-book-mobile="{{ $book->id_book }}"
                                            >–</button>
                                            <input type="text" maxlength="3" min="1" readonly
                                            class="input-text number-sidebar {{$CartMobileIdBook}}" id="{{$CartMobileIdBook}}"
                                            name="Lines" size="4" value="{{ $book->quantity }}"><button
                                            onclick="var result = document.getElementById('{{$CartMobileIdBook}}'); 
                                            var {{$CartMobileIdBook}} = result.value; if( !isNaN( {{$CartMobileIdBook}} )) result.value++;return false;"
                                            class="increase items-count btn-plus btn-plus-mobile btn-mobile-cart" type="button"
                                            data-id-plus-cart-mobile="{{ $CartMobileIdBook }}"
                                            data-id-plus-book-mobile="{{ $book->id_book }}">+</button>
                                    </div>
                                    <a class="button remove-item remove-item-cart remove-item-cart-mobile" href="javascript:;"
                                    data-url-web-delete="{{ route('deleteCart', ['id' => $book->id_book]) }}">Xoá</a>
                                </div>
                            </div>
                        </div>
                @endforeach
                <div class="header-cart-price" style="">
                    <div class="title-cart">
                        <h3 class="text-xs-left">Tổng tiền</h3><a
                            class="text-xs-right pull-right totals_price_mobile">{{ number_format($total) }}₫</a>
                    </div>
                    <div class="checkout"><button class="btn-proceed-checkout-mobile" title="Tiến hành thanh toán"
                            type="button"
                            onclick="window.location.href='{{ route('checkout', ['token' => session()->get('book_token')]) }}'"><span>Tiến
                                hành thanh
                                toán</span></button><button class="btn btn-white f-left" title="Tiếp tục mua hàng"
                            type="button" onclick="window.location.href='{{ route('book') }}'"><span>Tiếp tục mua
                                hàng</span></button></div>
                </div>
            @endif
        @endif
    </div>

</div>
</div>
