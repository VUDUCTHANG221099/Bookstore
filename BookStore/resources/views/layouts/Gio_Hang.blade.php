<div class="header-right">
    <div class="top-cart-contain f-right">

        <div class="mini-cart text-xs-center cart-web-right">
            <div class="heading-cart cart_header">
                <a class="img_hover_cart" href="{{ route('GioHangView') }}" title="Giỏ hàng">
                    <i class="fa fa-shopping-bag hidden-lg hidden-md hidden-sm"></i>
                    @php
                        // $quantity = 0;
                        
                        // $cart = session()->get('cart');
                        // if (isset($cart) and count($cart) > 0) {
                        //     foreach ($cart as $id => $item) {
                        //         $quantity += $item['quantity'];
                        //     }
                        // }
                        // $check =$quantity;
                    @endphp

                    <span
                        class="count_item count_item_pr">{{ (auth()->check() and isset($quantity)) ? $quantity : 0 }}</span>
                    <span class="hidden-xs">sản phẩm</span>
                    <i class="fa fa-sort-down hidden-xs"></i>
                </a>
            </div>
            <!-- Giỏ hàng -->
            <div class="top-cart-content">
                <ul id="cart-sidebar" class="mini-products-list count_li">
                    @php
                        // $total = 0;
                    @endphp
                    @if (auth()->check() and isset($carts) and count($carts) > 0)

                        <ul class="list-item-cart" data-url="{{ route('updateCart') }}">

                            @foreach ($carts as $item)
                                <li class="item">
                                    <div class="border_list">
                                        <a class="product-image"
                                            href="{{ route('bookDetailsFE', ['book_slug' => $item->slug]) }}"
                                            title="{{ $item->book_name }}"><img alt="{{ $item->book_name }}"
                                                src="{{ isset($item->image) ? asset('images/book/' . $item->image) : asset('images/default.jpg') }}"
                                                width="100" /></a>
                                        <div class="detail-item">
                                            <div class="product-details">
                                                <p class="product-name">
                                                    <a href="{{ route('bookDetailsFE', ['book_slug' => $item->slug]) }}"
                                                        title="{{ $item->book_name }}">
                                                        {{ $item->book_name }}</a>
                                                </p>
                                            </div>
                                            <div class="product-details-bottom">
                                                <span class="price">{{ number_format($item->price - 3000) }}₫</span>
                                                <a data-url="{{ route('deleteCart', ['id' => $item->id_book]) }}"
                                                    href="javascript:;" title="Xóa"
                                                    class="remove-item-cart fa fa-times remove-item-cart-book">&nbsp;</a>
                                                <div class="quantity-select qty_drop_cart">
                                                    @php
                                                        $idOfBook = "BookCart_$item->id_book";
                                                    @endphp
                                                    <input class="variantID" type="hidden" maxlength="3"
                                                        name="variantId">
                                                    <button class="btn_reduced reduced items-count-Cart btn-minus-Cart"
                                                        data-id-minus-Cart="{{ $idOfBook }}"
                                                        data-id-book-minus-Cart="{{ $item->id_book }}"
                                                        onclick="var result = document.getElementById('{{ $idOfBook }}'); var {{ $idOfBook }} = result.value;
                                                    if( !isNaN( {{ $idOfBook }} ) && {{ $idOfBook }} > 1 )
                                                result.value--;return false;"
                                                        type="button">-</button>
                                                    <input type="text" maxlength="3" min="1" readonly=""
                                                        class="input-text number-sidebar" id="{{ $idOfBook }}"
                                                        name="Lines" size="4" value="{{ $item->quantity }}">

                                                    <button
                                                        onclick="var result = document.getElementById('{{ $idOfBook }}'); var {{ $idOfBook }} = result.value;
                                                  if( !isNaN( {{ $idOfBook }} )) result.value++;return false;"
                                                        class="btn_increase increase items-count-Cart btn-plus-Cart"
                                                        type="button" data-id-plus-Cart="{{ $idOfBook }}"
                                                        data-id-book-plus-Cart="{{ $item->id_book }}">+</button>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                        <div class="pd">
                            <div class="top-subtotal">
                                Tổng tiền:

                                <span class="price price_big">{{ number_format($total) }}₫</span>
                            </div>
                        </div>
                        <div class="pd right_ct">
                            <a href="{{ route('checkout', ['token' => session()->get('book_token')]) }}"
                                class="btn btn-primary"><span>Thanh
                                    toán</span></a><a href="{{ route('GioHangView') }}"
                                class="btn btn-white"><span>Giỏ hàng</span></a>
                        </div>
                    @else
                        <div class="no-item">
                            <p>Không có sản phẩm nào.</p>
                        </div>
                    @endif

                </ul>
            </div>
            <!-- Giỏ hàng -->
        </div>
    </div>

    <div class="top-cart-contain f-right hidden">
        <div class="mini-cart text-xs-center">
            <div class="heading-cart">
                <a class="bg_cart" href="#" title="Giỏ hàng">
                    <i class="ion-android-cart"></i>
                    <span class="count_item count_item_pr"></span>
                </a>
            </div>
        </div>
    </div>
</div>
{{-- <script src="{{ asset('FrontEnd/assets/js/jquery.min.js') }}" type="text/javascript"></script> --}}
<script>
    $('.remove-item-cart-book').click(function() {
        let RemoveCart = $(this).data('url');
        $.ajax({
            type: "GET",
            url: RemoveCart,
            success: function(data) {
                // if (data.cart.length === 0) {
                //     Gio_Hang();
                //     if (typeof GioHangView_Sub === "function") {
                //         GioHangView_Sub()
                //     }




                // } else {

                // $('.top-cart-content').css('display', 'block')

                Gio_Hang();
                // $(".mini-cart").hover(function() {
                // })

                // }
                if (typeof GioHangView_Sub === "function") {
                    GioHangView_Sub()
                }

                //             .mini-cart:hover .top-cart-content {
                // display: block
                // }
                // $('.RemoveCart').html(data.TotalCart)
                // modalThemGioHangGlobal.show();
            }
        });
    })

    function Update_Cart(idBookCart, quantity) {
        let urlUpdateCart = $('.list-item-cart').data('url');
        $.ajax({
            type: "GET",
            url: urlUpdateCart,
            data: {
                id: idBookCart,
                quantity: quantity
            },
            dataType: "json",
            success: function(data) {
                // alert(400);
                Gio_Hang();
                if (typeof GioHangView_Sub === "function") {
                    GioHangView_Sub()
                }
            }
        });
    }
    //Plus
    function Plus_Cart(idPlusCart, idPlusOfIDCart, idPlusJSCart, idBookCart) {
        $('.btn-plus-Cart').click(function() {

            if (idPlusCart === $(this).data(idPlusOfIDCart)) {
                let quantity = $(idPlusJSCart).val();
                $.ajax({
                    type: "GET",
                    url: "{{ route('GetdataBook') }}",
                    data: {
                        id: idBookCart
                    },
                    dataType: "json",
                    success: function(data) {
                        if (quantity > data.book.quantity) {
                            alert("Sản phẩm " + data.book.book_name + " chỉ còn " + data
                                .book.quantity + " sản phẩm")
                                quantity = $(idPlusJSCart).val(data.book.quantity)
                                Update_Cart(idBookCart, quantity)

                        } else {
                            if (data.session.quantity < data.book.quantity) {
                                Update_Cart(idBookCart, quantity)
                            } else if (data.session.quantity > data.book.quantity) {
                                alert("Sản phẩm " + data.book.book_name + " chỉ còn " + data
                                    .book.quantity + " sản phẩm")
                                    quantity = $(idPlusJSCart).val(data.book.quantity)
                                Update_Cart(idBookCart, quantity)

                            } else {
                                alert("Sản phẩm " + data.book.book_name + " chỉ còn " + data
                                    .book.quantity + " sản phẩm")
                                    quantity = $(idPlusJSCart).val(data.book.quantity)
                                Update_Cart(idBookCart, quantity)

                            }
                        }
                    }
                });
                // if(quantity>5){
                //     alert(idBookCart);
                // }else{

                //     Update_Cart(idBookCart, quantity)
                // }
                // alert(quantity)
            }
        })
    }

    function Minus_Cart(idMinusCart, idMinusOfIDCart, idMinusJSCart, idBookCart) {
        $('.btn-minus-Cart').click(function() {
            if (idMinusCart === $(this).data(idMinusOfIDCart)) {
                let quantity = $(idMinusJSCart).val();
                Update_Cart(idBookCart, quantity)
            }
        })
    }


    let id = $('.items-count-Cart');
    for (let i = 0; i < id.length; i++) {

        if ($(id[i]).data('id-plus-Cart') !== undefined) {
            // console.log($(id[i]).data('id-plus-Cart'));
            let idPlusCart = $(id[i]).data('id-plus-Cart');
            let idPlusOfIDCart = 'id-plus-Cart'
            let idBookCart = $(id[i]).data('id-book-plus-Cart');
            let idPlusJSCart = "#" + $(id[i]).data(idPlusOfIDCart);
            Plus_Cart(idPlusCart, idPlusOfIDCart, idPlusJSCart, idBookCart);
            // $('.btn-plus-Cart').click(function() {
            //     if (idPlusCart === $(this).data(idPlusOfIDCart)) {
            //         let quantity = $(idPlusJSCart).val()
            //         alert(idBookCart)

            //         // Update_Cart(idBook, quantity)
            //     }
            // });
        }

        if ($(id[i]).data('id-minus-Cart') !== undefined) {
            // console.log($(id[i]).data('id-minus-Cart'));
            let idMinusCart = $(id[i]).data('id-minus-Cart');
            let idMinusOfIDCart = 'id-minus-Cart'
            let idBookCart = $(id[i]).data('id-book-minus-Cart');
            let idMinusJSCart = "#" + $(id[i]).data(idMinusOfIDCart);
            Minus_Cart(idMinusCart, idMinusOfIDCart, idMinusJSCart, idBookCart)
            // $('.btn-minus-Cart').click(function() {
            //     if (idMinusCart === $(this).data(idMinusOfIDCart)) {
            //         let quantity = $(idMinusJSCart).val()
            //         alert(quantity)
            //         // Update_Cart(idBook, quantity)
            //     }
            // });
        }
    }
    //Plus Minus btn
</script>
