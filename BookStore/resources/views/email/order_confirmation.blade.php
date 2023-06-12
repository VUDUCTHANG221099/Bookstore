<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id=":jm" class="a3s aiL ">
        <div style="font-family:&quot;Arial&quot;,Helvetica Neue,Helvetica,sans-serif;line-height:18pt">
            <div class="adM">



                <p>Cảm ơn Anh/chị đã đặt hàng tại <strong>Bookstore!</strong></p>

                <p>Đơn hàng của Anh/chị đã được tiếp nhận, chúng tôi sẽ nhanh chóng liên hệ với Anh/chị.</p>

                {{-- <p>Để kiểm tra trạng thái đơn hàng, Anh/chị vui lòng Đăng nhập vào tài khoản.</p> --}}
                <strong>Thông tin người mua</strong><br>

                <table>
                    <tbody>
                        <tr>
                            <td>Họ tên: </td>
                            <td>{{ $user->full_name }}</td>
                        </tr>
                        <tr>
                            <td>Điện thoại: </td>
                            <td>{{ $customer->phone }}</td>
                        </tr>
                        <tr>
                            <td>Email: </td>
                            <td><a href="mailto:{{ $user->email }}" target="_blank">{{ $user->email }}</a></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ: </td>
                            <td>{{ $customer->address }}</td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <strong>Thông tin người nhận</strong>

                <table>
                    <tbody>
                        <tr>
                            <td>Họ tên: </td>
                            <td>{{ $user->full_name }}</td>
                        </tr>
                        <tr>
                            <td>Điện thoại: </td>
                            <td>{{ $customer->phone }}</td>
                        </tr>
                        <tr>
                            <td>Địa chỉ: </td>
                            <td>{{ $customer->address }}</td>
                        </tr>
                    </tbody>
                </table>
                <strong>Thông tin đơn hàng</strong>

                <table>
                    <tbody>
                        <tr>
                            <td><strong>Mã đơn hàng:</strong> #{{ $id_code }}</td>
                            <td><strong>Ngày tạo:</strong> {{ $datetime }}</td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <br>

                <table>
                    <tbody>
                        <tr>
                            <td>Sản phẩm</td>

                            <td style="text-align:center;width:100px">Số lượng</td>
                            <td style="text-align:right;width:150px">Tổng</td>
                        </tr>
                        @php
                            $total = 0;
                        @endphp
                        @if (isset($cart) and count($cart) > 0)
                            @foreach ($cart as $order)
                                {{-- {{ dd($order->avatar)}} --}}
                                @php
                                    $total += $order->quantity * ($order->price-3000);
                                @endphp
                                <tr>
                                    <td>{{$order->book_name}}</td>

                                    <td style="text-align:center;width:100px">{{$order->quantity}}</td>
                                    <td style="text-align:right;width:150px">{{number_format($order->price-3000)}} VND</td>
                                </tr>
                                @endforeach
                            @endif

                            <tr>
                                <td>&nbsp;</td>
                                <td colspan="3">
                                    <table style="width:100%">
                                        <tbody>

                                            <tr>
                                                <td><strong>Tổng giá trị sản phẩm:</strong></td>
                                                <td style="width:150px">{{number_format($total)}} VND</td>
                                            </tr>

                                            <tr>
                                                <td><strong>Thành tiền:</strong></td>
                                                <td style="width:150px">{{number_format($total)}} VND</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                    </tbody>
                </table>
                &nbsp;

                <hr> <strong>Trân trọng cảm ơn</strong><br>
                Ban quản trị <a href="{{route('index')}}">Bookstore</a></div>
                <div class="yj6qo"></div><div class="adL">
                </div></div>
</body>

</html>
