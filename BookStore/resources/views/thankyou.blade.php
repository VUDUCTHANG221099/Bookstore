<!DOCTYPE html>
<html lang="en" class="thankyou-page">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cảm ơn</title>
    <link rel="stylesheet" href="{{ asset('FrontEnd/checkout/assets/css/checkout.vendor.min.css') }}">
    <link rel="stylesheet" href="{{ asset('FrontEnd/checkout/assets/css/checkout.min.css') }}">
    <script src="{{ asset('FrontEnd/checkout/assets/js/checkout.vendor.min.js') }}"></script>
  <script src="{{ asset('FrontEnd/checkout/assets/js/checkout.min.js')}}"></script>

</head>

<body data-no-turbolink="">

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
    <div class="content">
        <form>
            <div class="wrap wrap--mobile-fluid">
                <main class="main main--nosidebar">
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
                        <article class="row">
                            <div class="col col--primary">
                                <section class="section section--icon-heading">
                                    <div class="section__icon unprintable">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="72px" height="72px">
                                            <g fill="none" stroke="#8EC343" stroke-width="2">
                                                <circle cx="36" cy="36" r="35"
                                                    style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;">
                                                </circle>
                                                <path d="M17.417,37.778l9.93,9.909l25.444-25.393"
                                                    style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="thankyou-message-container">
                                        <h2 class="section__title">Cảm ơn bạn đã đặt hàng</h2>

                                        <p class="section__text">
                                            Một email xác nhận đã được gửi tới {{ $user->email }}. <br>
                                            Xin vui lòng kiểm tra email của bạn
                                        </p>


                                    </div>
                                </section>
                            </div>
                            <div class="col col--secondary">
                                <aside class="order-summary order-summary--bordered order-summary--is-collapsed"
                                    id="order-summary">
                                    <div class="order-summary__header">
                                        <div class="order-summary__title">
                                            Đơn hàng #{{ $id_code}}
                                            <span class="unprintable">({{ $quantity }})</span>
                                        </div>
                                        <div class="order-summary__action hide-on-desktop unprintable">
                                            <a data-toggle="#order-summary"
                                                data-toggle-class="order-summary--is-collapsed" class="expandable">
                                                Xem chi tiết
                                            </a>
                                        </div>
                                    </div>
                                    <div class="order-summary__sections">
                                        <div
                                            class="order-summary__section order-summary__section--product-list order-summary__section--is-scrollable order-summary--collapse-element">
                                            <table class="product-table">
                                                <tbody>
                                                    @php
                                                        $total=0;
                                                    @endphp
                                                    @if (isset($cart) and count($cart) > 0)
                                                        @foreach ($cart as $order)
                                                        {{-- {{ dd($order->avatar)}} --}}
                                                        @php
                                                            $total+=$order->quantity*($order->price-3000);
                                                        @endphp
                                                            <tr class="product">
                                                                <td class="product__image">
                                                                    <div class="product-thumbnail">
                                                                        <div class="product-thumbnail__wrapper">

                                                                            <img src="{{ isset($order->avatar) ? asset('images/book/' . $order->avatar) : asset('images/default.jpg') }}"
                                                                                alt="{{$order->book_name}}"
                                                                                class="product-thumbnail__image">

                                                                        </div>
                                                                        <span
                                                                            class="product-thumbnail__quantity unprintable">{{ $order->quantity }}</span>
                                                                    </div>
                                                                </td>
                                                                <th class="product__description">
                                                                    <span
                                                                        class="product__description__name">{{ $order->book_name }}</span>


                                                                </th>
                                                                <td class="product__quantity printable-only">
                                                                    x {{ $order->quantity}}
                                                                </td>
                                                                <td class="product__price">


                                                                    {{number_format($order->quantity*($order->price-3000))}}₫

                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif



                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="order-summary__section">
                                            <table class="total-line-table">
                                                <tbody class="total-line-table__tbody">


                                                    <tr class="total-line total-line--subtotal">
                                                        <th class="total-line__name">Tạm tính</th>
                                                        <td class="total-line__price">{{ number_format($total) }}₫</td>
                                                    </tr>

                                                    <tr class="total-line total-line--shipping-fee">
                                                        <th class="total-line__name">Phí vận chuyển</th>
                                                        <td class="total-line__price">

                                                            0₫

                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="order-summary__section">
                                            <table class="total-line-table">
                                                <tbody class="total-line-table__tbody">
                                                    <tr class="total-line payment-due">
                                                        <th class="total-line__name">
                                                            <span class="payment-due__label-total">Tổng cộng</span>
                                                        </th>
                                                        <td class="total-line__price">
                                                            <span
                                                                class="payment-due__price">{{ number_format($total) }}₫</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </aside>
                            </div>
                            <div class="col col--primary">
                                <section class="section">
                                    <div class="section__content section__content--bordered">

                                        <div class="row">

                                            <div class="col col--md-two">
                                                <h2>Thông tin mua hàng</h2>
                                                
                                                <p>Họ và tên: {{ $user->full_name }}</p>

                                                <p>Email: {{ $user->email }}</p>


                                                <p>Số điện thoại: {{ $customer->phone }}</p>

                                            </div>

                                            <div class="col col--md-two">
                                                <h2>Địa chỉ nhận hàng</h2>
                                                <p>Họ và tên: {{ $user->full_name }}</p>

                                                <p>Địa chỉ: {{ $customer->address }}</p>





                                                <p>Số điện thoại: {{ $customer->phone }}</p>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col--md-two">
                                                <h2>Phương thức thanh toán</h2>
                                                <p>{{ $paymentName }}</p>
                                            </div>
                                            <div class="col col--md-two">
                                                <h2>Đơn vị vận chuyển</h2>
                                                <p>{{ $shipper }}</p>
                                            </div>
                                        </div>

                                    </div>
                                </section>
                                <section class="section unprintable">
                                    <div class="field__input-btn-wrapper field__input-btn-wrapper--floating">
                                        <a href="{{ route('book') }}" class="btn btn--large">Tiếp tục mua hàng</a>
                                        <span class="text-icon-group text-icon-group--large icon-print"
                                            onclick="window.print()">
                                            <i class="fa fa-print"></i>
                                            <span>In </span>
                                        </span>
                                    </div>
                                </section>
                            </div>
                        </article>
                    </div>






                </main>
            </div>
        </form>
    </div>

</body>

</html>
