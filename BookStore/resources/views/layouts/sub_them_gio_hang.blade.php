@php
// $cart = session()->get('cart');
if (isset($cart)) {
    // $total = 0;
    // $quantity = 0;
    // foreach ($cart as $id => $item) {
    //     // $quantity += $item['quantity'];
    // }
}
@endphp
@if (isset($carts) and count($carts) > 0)
    @foreach ($carts as $book)
        @if ($carbon::now() == $book->time)
            <div class="title-popup-cart">
                <span class="your_product"><img src="{{ asset('FrontEnd/assets/images/check_popup.png') }}"
                        alt="Check Popup" />Bạn đã
                    thêm

                    <span class="cart-popup-name"><a href="{{ route('bookDetailsFE', ['book_slug' => $book->slug]) }}"
                            title="">

                            {{ $book->book_name }}

                        </a>
                    </span>
                    vào giỏ hàng</span>
            </div>
        @endif
    @endforeach
@endif


<div class="wrap_popup">
    <div class="title-quantity-popup">
        <img src="{{ asset('FrontEnd/assets/images/cart.png') }}" alt="Cart" />
        <span class="cart_status" onclick="window.location.href='{{ route('GioHangView') }}'">Giỏ
            hàng của bạn
            có
            {{ isset($quantity) ? $quantity : false }}
            <span class="cart-popup-count"></span> sản
            phẩm <i class="fa fa-caret-right"></i></span>
    </div>
    <div class="content-popup-cart" data-url="{{ route('updateCart') }}">
        <div class="thead-popup">
            <div style="width: 20%" class="text-center">Ảnh sản phẩm</div>
            <div style="width: 36%" class="text-center">Tên sản phẩm</div>
            <div style="width: 15%" class="text-center">Đơn giá</div>
            <div style="width: 14%" class="text-center">Số lượng</div>
            <div style="width: 14%" class="text-center">Thành tiền</div>
        </div>
        <div class="tbody-popup scrollbar-dynamic">
            @if (isset($carts) and count($carts) > 0)

                @foreach ($carts as $book)
                    @php
                        
                        // $total += $book['price'] * $book['quantity'];
                    @endphp

                    <div class="item-popup">
                        <div style="width: 20%;" class="border height image_ text-left">
                            <div class="item-image"><a class="product-image"
                                    href="{{ route('bookDetailsFE', ['book_slug' => $book->slug]) }}"
                                    title="{{ $book->book_name }}"><img alt="{{ $book->book_name }}"
                                        src="{{ isset($book->image) ? asset('images/book/' . $book->image) : asset('images/default.jpg') }}"
                                        width="90"></a></div>
                        </div>
                        <div style="width:36%;" class="height text-left fix_info">
                            <div class="item-info">
                                <p class="item-name"><a class="text3line textlinefix"
                                        href="{{ route('bookDetailsFE', ['book_slug' => $book->slug]) }}"
                                        title="{{ $book->book_name }}">{{ $book->book_name }}</a></p><span
                                    class="variant-title-popup"></span>
                                <a href="javascript:;" class="remove-item-cart"
                                    data-url="{{ route('deleteCart', ['id' => $book->id_book]) }}" title="Xóa"><i
                                        class="fa fa-close"></i>&nbsp;&nbsp;Bỏ
                                    sản
                                    phẩm
                                </a>
                                @if ($carbon::now() == $book->time)
                                    <p class="addpass" style="color:#fff;margin:0px;"><span class="add_sus"
                                            style="color:#898989;"><i
                                                style="margin-right:5px; color:red; font-size:13px;" class="fa fa-check"
                                                aria-hidden="true"></i> Sản phẩm vừa thêm!</span>
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div style="width: 15%;" class="border height text-center">
                            <div class="item-price"><span
                                    class="price">{{ number_format($book->price - 3000) }}₫</span></div>
                        </div>
                        <div style="width: 14%;" class="border height text-center">
                            <div class="qty_h check_">
                                @php
                                    $idOfBook = "BookCart$book->id_book";
                                @endphp
                                <input class="variantID" type="hidden" name="variantId">
                                <button class="num1 reduced items-count btn-minus" data-id-minus="{{ $idOfBook }}"
                                    data-id-book-minus="{{ $book->id_book }}"
                                    onclick="var result = document.getElementById('{{ $idOfBook }}'); var {{ $idOfBook }} = result.value;
                                if( !isNaN( {{ $idOfBook }} ) && {{ $idOfBook }} > 1 )
                                 result.value--;return false;"
                                    type="button">-</button>
                                <input type="text" maxlength="3" min="0" readonly=""
                                    class="input-text 
                                number-sidebar"
                                    id="{{ $idOfBook }}" name="Lines" size="4"
                                    value="{{ $book->quantity }}">
                                <button
                                    onclick="var result = document.getElementById('{{ $idOfBook }}'); var {{ $idOfBook }} = result.value;
                                     if( !isNaN( {{ $idOfBook }} )) result.value++;return false;"
                                    class="num2 increase items-count btn-plus" type="button"
                                    data-id-plus="{{ $idOfBook }}"
                                    data-id-book-plus="{{ $book->id_book }}">+</button>
                            </div>
                        </div>
                        <div style="width: 14%;" class="border height text-center"><span class="cart-price">
                                <span
                                    class="price">{{ number_format(($book->price - 3000) * $book->quantity) }}₫</span>
                            </span></div>
                    </div>
                @endforeach
            @endif
            <!-- Thêm sách mới -->



        </div>
        <div class="tfoot-popup">
            <div class="tfoot-popup-1 a-right clearfix">
                <div class="pull-left to-cart">
                    <p>
                        <a href="javascript:void(0)" title="Tiếp tục mua hàng" class="TiepTucMuaHang">
                            <i class="fa fa-caret-left"></i> Tiếp tục mua
                            hàng
                        </a>
                    </p>
                </div>
                <span class="total-p popup-total">Tổng tiền: <span class="total-price">

                        {{ isset($total) ? number_format($total) : false }}₫</span></span>
            </div>
            <div class="tfoot-popup-2 clearfix">
                <a class="button buy_ btn-proceed-checkout" title="Tiến hành thanh toán"
                    href="{{ route('checkout', ['token' => session()->get('book_token')]) }}">
                    <span>Tiến
                        hành thanh toán</span></a>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('FrontEnd/assets/js/jquery.min.js') }}" type="text/javascript"></script>
<script>
    $('.TiepTucMuaHang').click(function() {
        modalThemGioHangGlobal.hide();
    })
    $('.remove-item-cart').click(function() {
        let RemoveCart = $(this).data('url');
        $.ajax({
            type: "GET",
            url: RemoveCart,
            success: function(data) {
                // alert(400)
                // console.log(data.check);
                if (data.check > 0) {
                    Gio_Hang();
                    Them_Gio_Hang_Ajax();


                } else {
                    Gio_Hang();
                    modalThemGioHangGlobal.hide();
                }
            }
        });
    })

    function UpdateCart(idBook, quantity) {
        let urlUpdateCart = $('.content-popup-cart').data('url');

        $.ajax({
            type: "GET",
            url: urlUpdateCart,
            data: {
                id: idBook,
                quantity: quantity
            },
            dataType: "json",
            success: function(data) {
                // if (quantity > data.book.quantity) {

                //     alert("Số lượng trong kho còn " + data.book.quantity + " quyển");
                //     quantity = $(abc).val(data.book.quantity);

                // } else {

                Them_Gio_Hang_Ajax();
                Gio_Hang();
                // }
            }
        });
    }

    //Plus
    function Plus(idPlus, idPlusOfID, idPlusJS, idBook) {
        $('.btn-plus').click(function() {
            if (idPlus === $(this).data(idPlusOfID)) {
                let quantity = $(idPlusJS).val();
                
                $.ajax({
                    type: "GET",
                    url: "{{ route('GetdataBook') }}",
                    data: {
                        id: idBook
                    },
                    dataType: "json",
                    success: function(data) {
                        if (quantity > data.book.quantity) {
                            alert("Sản phẩm " + data.book.book_name + " chỉ còn " + data
                                .book.quantity + " sản phẩm")
                            quantity = $(idPlusJS).val(data.book.quantity)
                        }else{
                            if (data.session.quantity < data.book.quantity) {
                                    UpdateCart(idBook, quantity)
                               
                            } else if (data.session.quantity > data.book.quantity) {
                                alert("Sản phẩm " + data.book.book_name + " chỉ còn " + data
                                    .book.quantity + " sản phẩm")
                                    quantity = $(idPlusJSCart).val(data.book.quantity)
                            } else {
                                alert("Sản phẩm " + data.book.book_name + " chỉ còn " + data
                                    .book.quantity + " sản phẩm")
                                    quantity = $(idPlusJSCart).val(data.book.quantity)
                            }
                        }
                    }
                });
            }
        })
    }
    //Plus/Minus
    //Minus
    function Minus(idMinus, idMinusOfID, idMinusJS, idBook) {
        $('.btn-minus').click(function() {
            if (idMinus === $(this).data(idMinusOfID)) {
                let quantity = $(idMinusJS).val()
                UpdateCart(idBook, quantity, idMinusJS)
            }
        });
    }
    //Plus/Minus
    //Plus Minus btn
    let id = $('.items-count');
    for (let i = 0; i < id.length; i++) {
        if ($(id[i]).data('id-minus') !== undefined) {
            let idMinus = $(id[i]).data('id-minus');
            let idMinusOfID = 'id-minus'
            let idBook = $(id[i]).data('id-book-minus');
            let idMinusJS = "#" + $(id[i]).data(idMinusOfID);
            Minus(idMinus, idMinusOfID, idMinusJS, idBook);
        }
        if ($(id[i]).data('id-plus') !== undefined) {
            let idPlus = $(id[i]).data('id-plus');
            let idPlusOfID = 'id-plus'
            let idBook = $(id[i]).data('id-book-plus');
            let idPlusJS = "#" + $(id[i]).data(idPlusOfID);

            Plus(idPlus, idPlusOfID, idPlusJS, idBook);
        }
    }
    //Plus Minus btn
</script>
@include('ajax.cart')
