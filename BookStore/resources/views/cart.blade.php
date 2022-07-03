@extends('layouts.master')
@section('header_CSS')
    <link rel="stylesheet" href="{{ asset('FrontEnd/assets/css/collection_style.scss.css') }}" />
    <link rel="stylesheet" href="{{ asset('FrontEnd/assets/css/cartpage.scss.css') }}" />
@endsection
@section('title')
    Giỏ hàng
@endsection

@section('content')
    @include('layouts.breadcrumb', ['link' => 'Giỏ hàng'])
    <section class="main-cart-page main-container col1-layout">
        @include('cart.sub_cart')

    </section>

    <script>
        GioHangView_Sub();

        function GioHangView_Sub() {
            $.ajax({
                type: "GET",
                url: "{{ route('GioHangView_Sub') }}",
                success: function(data) {
                    $('.main-cart-page').html(data.TotalCart);
                }
            });
        }
        // $('.remove-item').click(function() {
        //     alert(1000);
        //     // let urlRemoveCart = $(this).data('url-web-delete');

        //     // $.ajax({
        //     //     type: "GET",
        //     //     url: urlRemoveCart,
        //     //     success: function(data) {
        //     //         Gio_Hang();
        //     //         GioHangView_Sub();
        //     //     }
        //     // });
        // })
    </script>
   
@endsection
{{-- <script>
    $('.remove-item-cart-web').click(function() {
        let urlRemoveCart = $(this).data('url-web');

        $.ajax({
            type: "GET",
            url: urlRemoveCart,
            success: function(data) {
                Gio_Hang();
                GioHangView_Sub()
            }
        });
    })



    function GioHangView_Sub() {
        $.ajax({
            type: "GET",
            url: "{{ route('GioHangView_Sub') }}",
            success: function(data) {
                $('.main-cart-page').html(data.TotalCart);
            }
        });
    }


    function Update_Cart_web(idBookCart_web, quantity) {
        let urlUpdateCart = $('.item-cart-web').data('url-web');

        $.ajax({
            type: "GET",
            url: urlUpdateCart,
            data: {
                id: idBookCart_web,
                quantity: quantity
            },
            
            success: function(data) {
                alert(quantity)

                // GioHangView_Sub();
                // if (typeof GioHangView_Sub === "function") {
                GioHangView_Sub()
                // }
                Gio_Hang();

            }
        });
    }
    // GioHangView_Sub();

    //Plus
    function Plus_Cart_web(idPlusCart_web, idPlusOfIDCart_web, idPlusJSCart_web, idBookCart_web) {
        $('.btn-plus-cart-web').click(function() {
            if (idPlusCart_web === $(this).data(idPlusOfIDCart_web)) {
                let quantity = $(idPlusJSCart_web).val();
                alert(quantity)
                Update_Cart_web(idBookCart_web, quantity)
                // GioHangView_Sub();

            }
        })
    }

    // function Minus_Cart_web(idMinusCart_web, idMinusOfIDCart_web, idMinusJSCart_web, idBookCart_web){
    //     $('.btn-minus-cart-web').click(function() {
    //         if (idMinusCart_web === $(this).data(idMinusOfIDCart_web)) {
    //             let quantity = $(idMinusJSCart_web).val();
    //             alert(quantity);
    //             Update_Cart_web(idBookCart_web, quantity)
    //         }
    //     })
    // }
    let id_web = $('.items-count-web');
    for (let i = 0; i < id.length; i++) {

        if ($(id_web[i]).data('id-plus-cart-web') !== undefined) {
            // console.log($(id[i]).data('id-plus-Cart-web'));
            let idPlusCart_web = $(id_web[i]).data('id-plus-cart-web');
            let idPlusOfIDCart_web = 'id-plus-cart-web'
            let idBookCart_web = $(id_web[i]).data('id-book-plus-web');
            let idPlusJSCart_web = "#" + $(id_web[i]).data(idPlusOfIDCart_web);
            Plus_Cart_web(idPlusCart_web, idPlusOfIDCart_web, idPlusJSCart_web, idBookCart_web);

        }

        if ($(id_web[i]).data('id-minus-cart-web') !== undefined) {
            // console.log($(id[i]).data('id-minus-Cart'));
            let idMinusCart_web = $(id_web[i]).data('id-minus-cart-web');
            let idMinusOfIDCart_web = 'id-minus-cart-web'
            let idBookCart_web = $(id_web[i]).data('id-book-minus-web');
            let idMinusJSCart_web = "#" + $(id_web[i]).data(idMinusOfIDCart_web);
            // Minus_Cart_web(idMinusCart_web, idMinusOfIDCart_web, idMinusJSCart_web, idBookCart_web)
            // $('.btn-minus-Cart').click(function() {
            //     if (idMinusCart === $(this).data(idMinusOfIDCart)) {
            //         let quantity = $(idMinusJSCart).val()
            //         alert(quantity)
            //         // Update_Cart(idBook, quantity)
            //     }
            // });
        }
    }
</script> --}}
