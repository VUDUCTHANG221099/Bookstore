@php
// $cart = session()->get('cart');
// $quantity = 0;
// $total = 0;
// if (isset($cart)) {
//     # code...
//     foreach ($cart as $id => $book) {
//         $quantity += $book['quantity'];
//         $total = $book['price'] * $book['quantity'];
//     }
// }
@endphp



@include('cart.cart_web')
@include('cart.cart_mobile')
<script>
    $('.remove-item').click(function() {
        // alert(1000);
        let urlRemoveCart = $(this).data('url-web-delete');

        $.ajax({
            type: "GET",
            url: urlRemoveCart,
            success: function(data) {
                Gio_Hang();
                GioHangView_Sub()
            }
        });
    })

    //Cart Web
    function Update_Cart_Web(idBookWEB, quantity) {
        let urlUpdateCart = $('.update-web').data('url-update-web');
        $.ajax({
            type: "GET",
            url: urlUpdateCart,
            data: {
                id: idBookWEB,
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

    function Plus_Cart_Web(idPlusCartWEB, idPlusOfIDCartWEB, idPlusJSCartWEB, idBookWEB) {
        $('.btn-plus-web').click(function() {

            
            if (idPlusCartWEB === $(this).data(idPlusOfIDCartWEB)) {
                let quantity = $(idPlusJSCartWEB).val();
                // alert(idBookWEB);
                $.ajax({
                    type: "GET",
                    url: "{{ route('GetdataBook') }}",
                    data: {
                        id: idBookWEB
                    },
                    dataType: "json",
                    success: function(data) {
                        if (quantity > data.book.quantity) {
                            alert("Sản phẩm " + data.book.book_name + " chỉ còn " + data
                                .book.quantity + " sản phẩm")
                                quantity = $(idPlusJSCartWEB).val(data.book.quantity)
                                Update_Cart_Web(idBookWEB, quantity)

                        } else {
                            if (data.session.quantity < data.book.quantity) {
                                Update_Cart_Web(idBookWEB, quantity)
                            } else if (data.session.quantity > data.book.quantity) {
                                alert("Sản phẩm " + data.book.book_name + " chỉ còn " + data
                                    .book.quantity + " sản phẩm")
                                    quantity = $(idPlusJSCart).val(data.book.quantity)
                                Update_Cart_Web(idBookWEB, quantity)

                            } else {
                                alert("Sản phẩm " + data.book.book_name + " chỉ còn " + data
                                    .book.quantity + " sản phẩm")
                                    quantity = $(idPlusJSCart).val(data.book.quantity)
                                Update_Cart_Web(idBookWEB, quantity)

                            }
                        }
                    }
                });
                // Update_Cart(idBookCart, quantity)
            }
        })
    }

    function Minus_Cart_Web(idMinusCartWEB, idMinusOfIDCartWEB, idMinusJSCartWEB, idBookWEB) {
        $('.btn-minus-web').click(function() {
            if (idMinusCartWEB === $(this).data(idMinusOfIDCartWEB)) {
                let quantity = $(idMinusJSCartWEB).val();
                Update_Cart(idBookWEB, quantity)
            }
        })
    }
    let idweb = $('.btn-web-cart');
    for (let web = 0; web < idweb.length; web++) {
        if ($(idweb[web]).data('id-plus-cart-web') !== undefined) {
            let idPlusCartWEB = $(idweb[web]).data('id-plus-cart-web');
            let idPlusOfIDCartWEB = 'id-plus-cart-web'
            let idBookWEB = $(idweb[web]).data('id-plus-book-web');
            let idPlusJSCartWEB = "#" + $(idweb[web]).data(idPlusOfIDCartWEB);
            Plus_Cart_Web(idPlusCartWEB, idPlusOfIDCartWEB, idPlusJSCartWEB, idBookWEB)
        }
        if ($(idweb[web]).data('id-minus-cart-web') !== undefined) {
            let idMinusCartWEB = $(idweb[web]).data('id-minus-cart-web');
            let idMinusOfIDCartWEB = 'id-minus-cart-web'
            let idBookWEB = $(idweb[web]).data('id-minus-book-web');
            let idMinusJSCartWEB = "#" + $(idweb[web]).data(idMinusOfIDCartWEB);
            Minus_Cart_Web(idMinusCartWEB, idMinusOfIDCartWEB, idMinusJSCartWEB, idBookWEB)
            // Plus_Cart_Web(idPlusCartWEB, idPlusOfIDCartWEB, idPlusJSCartWEB, idBookWEB)


            // console.log(idMinusCartWEB);
            // console.log(idMinusJSCartWEB);
        }
    }
    //Cart Web

     //Cart Mobile
     function Update_Cart_mobile(idBookMobile, quantity) {
        let urlUpdateCart = $('.update-mobile').data('url-update-mobile');
        $.ajax({
            type: "GET",
            url: urlUpdateCart,
            data: {
                id: idBookMobile,
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

    function Plus_Cart_mobile(idPlusCartMobile, idPlusOfIDCartMobile, idPlusJSCartMobile, idBookMobile) {
        $('.btn-plus-mobile').click(function() {

            
            if (idPlusCartMobile === $(this).data(idPlusOfIDCartMobile)) {
                let quantity = $(idPlusJSCartMobile).val();
                // alert(idBookMobile);
                $.ajax({
                    type: "GET",
                    url: "{{ route('GetdataBook') }}",
                    data: {
                        id: idBookMobile
                    },
                    dataType: "json",
                    success: function(data) {
                        if (quantity > data.book.quantity) {
                            alert("Sản phẩm " + data.book.book_name + " chỉ còn " + data
                                .book.quantity + " sản phẩm")
                                quantity = $(idPlusJSCartMobile).val(data.book.quantity)
                                Update_Cart_mobile(idBookMobile, quantity)

                        } else {
                            if (data.session.quantity < data.book.quantity) {
                                Update_Cart_Web(idBookMobile, quantity)
                            } else if (data.session.quantity > data.book.quantity) {
                                alert("Sản phẩm " + data.book.book_name + " chỉ còn " + data
                                    .book.quantity + " sản phẩm")
                                    quantity = $(idPlusJSCartMobile).val(data.book.quantity)
                                Update_Cart_mobile(idBookMobile, quantity)

                            } else {
                                alert("Sản phẩm " + data.book.book_name + " chỉ còn " + data
                                    .book.quantity + " sản phẩm")
                                    quantity = $(idPlusJSCart).val(data.book.quantity)
                                Update_Cart_mobile(idBookMobile, quantity)

                            }
                        }
                    }
                });
                // Update_Cart(idBookCart, quantity)
            }
        })
    }

    function Minus_Cart_mobile(idMinusCartMobile, idMinusOfIDCartMobile, idMinusJSCartMobile, idBookMobile) {
        $('.btn-minus-mobile').click(function() {
            if (idMinusCartMobile === $(this).data(idMinusOfIDCartMobile)) {
                let quantity = $(idMinusJSCartMobile).val();
                Update_Cart(idBookMobile, quantity)
            }
        })
    }
    let idmobile = $('.btn-mobile-cart');
    for (let mobile = 0; mobile < idmobile.length; mobile++) {
        if ($(idmobile[mobile]).data('id-plus-cart-mobile') !== undefined) {
            let idPlusCartMobile = $(idmobile[mobile]).data('id-plus-cart-mobile');
            let idPlusOfIDCartMobile = 'id-plus-cart-mobile'
            let idBookMobile = $(idmobile[mobile]).data('id-plus-book-mobile');
            let idPlusJSCartMobile = "#" + $(idmobile[mobile]).data(idPlusOfIDCartMobile);
            Plus_Cart_mobile(idPlusCartMobile, idPlusOfIDCartMobile, idPlusJSCartMobile, idBookMobile)
        }
        if ($(idmobile[mobile]).data('id-minus-cart-mobile') !== undefined) {
            let idMinusCartMobile = $(idmobile[mobile]).data('id-minus-cart-mobile');
            let idMinusOfIDCartMobile = 'id-minus-cart-mobile'
            let idBookMobile = $(idmobile[mobile]).data('id-minus-book-mobile');
            let idMinusJSCartMobile = "#" + $(idmobile[mobile]).data(idMinusOfIDCartMobile);
            Minus_Cart_mobile(idMinusCartMobile, idMinusOfIDCartMobile, idMinusJSCartMobile, idBookMobile)
            // Plus_Cart_Web(idPlusCartWEB, idPlusOfIDCartWEB, idPlusJSCartWEB, idBookWEB)


            // console.log(idMinusCartWEB);
            // console.log(idMinusJSCartWEB);
        }
    }
    //Cart Mobile
</script>

{{-- <script src="{{ asset('FrontEnd/assets/js/jquery.min.js') }}" type="text/javascript"></script> --}}
