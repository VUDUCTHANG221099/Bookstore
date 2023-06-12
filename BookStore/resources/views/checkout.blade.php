<!DOCTYPE html>
<html lang="en" class="floating-labels">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thanh toán đơn hàng</title>
    <link rel="stylesheet" href="{{ asset('FrontEnd/checkout/assets/css/checkout.vendor.min.css') }}">
    <link rel="stylesheet" href="{{ asset('FrontEnd/checkout/assets/css/checkout.min.css') }}">
    <script src="{{ asset('FrontEnd/checkout/assets/js/checkout.vendor.min.js') }}"></script>
    <script src="{{ asset('FrontEnd/checkout/assets/js/checkout.min.js') }}"></script>
</head>

<body>
    <header class="banner">
        <div class="wrap">
            <div class="logo logo--left ">

                <h1 class="shop__name">
                    <a href="{{ route('index') }}">
                        Bookstore
                    </a>
                </h1>

            </div>
        </div>
    </header>
    <aside>
        <script>
            // if(location.reload()==true){
            //   alert('400')
            // }else{
            //   alert('500')
            // }
        </script>
        <button class="order-summary-toggle" data-toggle="#order-summary"
            data-toggle-class="order-summary--is-collapsed">
            <span class="wrap">
                <span class="order-summary-toggle__inner">
                    <span class="order-summary-toggle__text expandable">
                        Đơn hàng ({{ isset($quantity) ? $quantity : 0 }} sản phẩm)
                    </span>
                    <span
                        class="order-summary-toggle__total-recap">{{ number_format(isset($total) ? $total : 0) }}₫</span>
                </span>
            </span>
        </button>
    </aside>
    <div class="content">
        <form data-tg-refresh="checkout" id="checkoutForm" method="post"
            action="{{ route('orderBook', ['token' => session()->get('book_token')]) }}">
            {{-- <input type="hidden" name="_method" value="patch" /> --}}
            @csrf
            <div class="wrap">
                <main class="main">
                    <header class="main__header">
                        <div class="logo logo--left ">

                            <h1 class="shop__name">
                                <a href="{{ route('index') }}">
                                    Bookstore
                                </a>
                            </h1>

                        </div>
                    </header>
                    <div class="main__content">
                        <article class="animate-floating-labels row">
                            @include('checkout.Information')
                            @include('checkout.payment')

                        </article>



                    </div>







                </main>
                @include('checkout.cart')
            </div>

        </form>


    </div>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script>
        $('.input-radio').click(function(e) {

            if ($(this).val()) {
                $('.CheckMethodPay').hide();
                if ($(this).val() == 1) {
                    // alert($(this).val())
                    // $('#vnpay').attr('checked', 'True');
                    // $('#COD').attr('checked','False');
                    $('.content-box__row__desc').show();
                    $('.spinner').click(function(e) {
                        if ($('#order_type').val() == '') {
                            // e.preventDefault();
                            $('.err-order_type').fadeIn();

                            $('.err-order_type').html(`
                            <p style='color:red;'>Bạn không được để trống loại hàng hóa!</p>
                            `);
                            setTimeout(() => {
                                $('.err-order_type').fadeOut();
                            }, 3000)
                        }
                        // location.reload();
                        // location.reload(false)


                        // $('#vnpay').attr('checked', 'False');
                        // e.stopImmediatePropagation();
                    })
                }
                if ($(this).val() == 0) {
                    // $('.spinnerCOD').click(function() {

                        // alert('500')
                        $('.content-box__row__desc').hide();
                    // })
                    // $('#COD').attr('checked', 'True');
                    // $('#vnpay').attr('checked','False');


                }
                /*if ($selectPay == 1) {
                
                                $('.content-box__row__desc').show();
                                $('.errpaymentMethod').empty();
                                $('.spinner').click(function(e) {
                                    // e.preventDefault();
                                    var order_type = $('#order_type').val();
                                    // if (order_type == '') {
                                        // alert($selectPay)
                                        $(this).attr('checked', true);
                                        $('.content-box__row__desc').show();
                                        $('.err-order_type').fadeIn();
                
                                        $('.err-order_type').html(`
                      <p style='color:red;'>Bạn không được để trống loại hàng hóa!</p>
                      `);
                                        setTimeout(() => {
                                            $('.err-order_type').fadeOut();
                                        }, 3000)
                                        // $('.err-order_type').
                                    // }
                                    // e.preventDefault();
                                });
                
                            }
                            if ($selectPay == 0) {
                                $('.content-box__row__desc').hide();
                            }*/
            }
        })
        $('.input_shipper').click(function() {
            if ($(this).val() != 0) {
                $('.checkShipper').hide();
            }
        })
        // $('.input-radio').click(function(e) {

        //     if ($(this).val() == 1) {
        //         $('.content-box__row__desc').show();
        //         $('.errpaymentMethod').empty();

        //         $('.spinner').click(function(e) {
        //           // e.preventDefault();
        //           var order_type = $('#order_type').val();
        //           if (order_type === '') {
        //                 // alert('Please select')
        //                 $(this).attr('checked', true);
        //                 $('.content-box__row__desc').show();
        //                 $('.err-order_type').fadeIn();

        //                 $('.err-order_type').html(`
    //               <p style='color:red;'>Bạn không được để trống loại hàng hóa!</p>
    //               `);
        //                 setTimeout(() => {
        //                     $('.err-order_type').fadeOut();
        //                 }, 3000)
        //                 // $('.err-order_type').
        //                 e.preventDefault();
        //             }
        //         });


        //     } else {
        //         $('.content-box__row__desc').hide();
        //         $('.errpaymentMethod').empty();
        //         $(this).attr('checked', true);



        //     }
        // })
        // $('.input_shipper').click(function(e){
        //     $('.errshipper').empty();
        // })
    </script>
</body>

</html>
