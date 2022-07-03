@extends('admin::layouts.master', ['link' => 'Thanh toán online'])
@section('breadcrumb_sub')
    <li class="breadcrumb-item active">Thanh toán online</li>

    @endsection @section('title', 'Thanh toán online')
@section('content')


    <div class="container">
        <table class="datatable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên khách hàng</th>
                    <th>Mã đơn hàng</th>
                    <th>Số tiền</th>
                    <th>Ngân hàng</th>
                    <th>Loại thẻ</th>
                    <th>Ngày giờ</th>
                    {{-- <th>Nội dung</th> --}}

                    {{-- <th class="text-center">Hành động</th> --}}
                </tr>
            </thead>
            <tbody>
                {{-- @dd($payment) --}}
                @if (isset($payment))

                    @foreach ($payment as $item)
                        <tr>
                            <td>{{$count++}}</td>
                            <td>{{$item->full_name}}</td>
                            <td>{{$item->id_code}}</td>
                            <td>{{number_format($item->vnp_Amount)}}đ</td>
                            <td>{{$item->vnp_BankCode}}</td>
                            <td>{{$item->vnp_CardType}}</td>
                            <td>{{$carbon::parse($item->vnp_PayDate)->format('d/m/Y H:i:s')}}</td>
                            {{-- <td>{{$item->vnp_OrderInfo}}</td> --}}
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection
@include('admin::modal.modalPay')
@include('admin::ajax.ajaxPay')
