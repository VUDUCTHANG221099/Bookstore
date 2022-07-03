@extends('admin::layouts.master', ['link' => 'Đơn hàng'])
@section('breadcrumb_sub')
    <li class="breadcrumb-item active">Đơn hàng</li>

@endsection
@section('title', 'Đơn hàng')

@section('content')
    <div class="container">
        <table class="datatable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên khách hàng</th>
                    <th>Mã đơn hàng</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                    {{-- <th>Đơn vị vận chuyển</th> --}}
                    <th>Ngày mua</th>
                    <th>Trạng thái</th>
                    {{-- <th>Trạng thái</th> --}}
                    <th class="text-center">Hành động</th>
                </tr>
            </thead>
            <tbody>
            
                @if (isset($order))

                    @foreach ($order as $item)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $item->full_name }}</td>
                            <td>{{ $item->id_code }}</td>
                            <td style="text-align:center">{{ $item->Quantity }}</td>
                            <td> <span class="money">{{ $item->Price }}</span>đ</td>
                            {{-- <td>{{ $item->shipper_name }}</td> --}}
                            <td>{{ $carbon::parse($item->date_order)->format('h:i:s d/m/Y') }}</td>
                            <td>

                                {!!($item->status==1)?'<span class="btn btn-primary" style="cursor: default;">Thành công</span>
                                ':'<span class="btn btn-danger" style="cursor: default;">Đang xử lý</span>'!!}
                            </td>
                            {{-- <td>
                        {!!($item->status==1)?'<span class="btn btn-primary" style="cursor: default;">Thành công</span>
                        ':'<span class="btn btn-danger" style="cursor: default;">Đang xử lý</span>'!!}
                    </td> --}}
                            <td class="text-center">
                                <a title="Chi tiết" href="{{route('admin_orderDetails',['id_code'=> $item->id_code ])}}" class="border border-white bg-white">
                                    <i class="fas fa-list-alt"></i>
                                </a>
                                {{-- <a href="" class="border border-black bg-white">
                                    <i class="fa fa-edit"></i>
                                </a> --}}
                                {{-- <button value="{{ $item->id }}" class="EditAdmin border border-white">
                            <i class="fa fa-edit"></i>
                        </button>
                        <button value="{{ $item->id }}" class="RemoveAdmin border border-white">
                            <i class="fa fa-trash text-danger"></i>
                        </button> --}}
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection
@include('admin::modal.modalOrder')
@include('admin::ajax.ajaxOrder')
