@extends('admin::layouts.master',['link'=>'Chi tiết đơn hàng'])
@section('breadcrumb_sub')
    <li class="breadcrumb-item active">Chi tiết đơn hàng</li>

    @endsection @section('title', 'Chi tiết đơn hàng')
@section('content')
<h2 style="" class="pl-3">Thông tin khách hàng</h2>
<div class="container">
    <table class="table table-bordered">
        {{-- {{dd($order['order'])}} --}}
        @if (isset($order['customer']) and  isset($order['date']) and isset($shipper))
            
        <tbody>
            <tr>
                <td style="width: 15%;">Họ và tên</td>
                <td>{{$order['customer']->full_name}}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{$order['customer']->email}}</td>
            </tr>
            <tr>
                <td>Số điện thoại</td>
                <td>{{$order['customer']->phone}}</td>
            </tr>
            <tr>
                <td>Địa chỉ</td>
                <td>{{$order['customer']->address}}</td>
            </tr>
            
            <tr>
                <td>Ngày đặt</td>
                <td>{{$carbon::parse($order['date'])->format('h:i:s d/m/Y')}}</td>
            </tr>
            <tr>
                <td>Đơn vị vận chuyển</td>
                <td>{{$shipper}}</td>
            </tr>
        </tbody>
        @endif
      </table>
</div>
<br>
<br>
<br>
<h2 style="" class="pl-3">Chi tiết đơn hàng</h2>
<div class="container">
    <table class="table table-bordered">
        {{-- {{dd($order['order'])}} --}}

        <thead class="thead-dark text-center">
            <tr>
                <th>#</th>
                <th colspan="2">Tên sách</th>
                {{-- <th>Hình ảnh</th> --}}

                <th>Số lượng</th>
                <th>Giá tiền</th>
                <th>Tổng tiền</th>
            </tr>
        </thead>
        <tbody >
            @if (isset($order['order']) and count($order['order']))
            @php
                $count=1;
            @endphp
            <style>
                .centerXY{
                    text-align:justify; 
                    vertical-align: middle !important;
                }
            </style>
                @foreach ($order['order'] as $item)
                    <tr>
                        <td style="width: 3%;" class="centerXY">{{$count++}}</td>
                        <td class="centerXY" style="border-right: none">
                            {{$item->book_name}}
                        </td>
                        <td style="width: 60px; height: 60px; border-left: none">
                            <img src="{{ 
                                isset($item->avatar)?asset('images/book/'.$item->avatar):
                                asset('images/default.jpg') }}" alt="{{$item->book_name}}"
                             width="50px" height="50px" >
                            {{-- {{$item->quantity}} --}}

                        </td>
                        <td class="centerXY" style="text-align:center ">
                            {{$item->orderQuantity}}

                        </td>
                        <td class="centerXY" style="text-align:center ">
                            {{number_format($item->price-3000)}}đ
                        </td >
                        <td class="centerXY" style="text-align:center ">
                            {{number_format($item->PriceTotal)}}đ

                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                @if (isset($order['total']))
                    
                <td colspan="6" style="text-align:right;">
                    Tổng tiền: {{number_format($order['total'])}}đ</td>
                @endif
            </tr>
        </tfoot>
      
      </table>
</div>
<div  class=" container">
    @if ($order['idCodeStatus']->status==0)
        
    <div class="mt-3 mb-5 ml-3">
        <form action="{{ route('confirmOrder') }}" method="post">
                <input type="hidden" name="id_code" value="{{$order['idCodeStatus']->id_code}}">
                @csrf
            <button type="submit" class="btn btn-success">Xác nhận đơn hàng</button>
        </form>
    </div>
    @endif
</div>
@endsection