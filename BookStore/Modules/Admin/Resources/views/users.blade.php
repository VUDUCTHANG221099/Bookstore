@extends('admin::layouts.master',['link'=>'Khách hàng'])
@section('breadcrumb_sub')
    <li class="breadcrumb-item active">Khách hàng</li>

    @endsection @section('title', 'Khách hàng') @section('content')
    <div class="contanier">

        <table class="datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Họ và tên</th>
                    <th>Email</th>
                    <th>Avatar</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Status</th>
                    <th class="text-center">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($customers) and count($customers)>0)
                    
                @foreach ($customers as $item)
                    <tr>
                        <td>{{ $count++ }}</td>
                        <td>{{ $item->full_name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            <img src="{{ isset($item->avatar) ? asset('images/users' . $item->avatar) : asset('images/default.jpg') }}"
                                alt="" width="100px" height="100px" />
                        </td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->address }}</td>
                        <td>
                            @if ($item->isOnline())
                                <span class="text-success">Online</span>
                            @else
                            <span class="text-muted">Offline</span>

                            @endif
                        </td>
                        <td class="text-center">
                            <button value="{{ $item->id }}" class="EyeCustomer border border-white bg-white">
                                <i class="fa fa-eye text-blue"></i>
                            </button>

                            <button value="{{ $item->id }}" class="RemoveCustomer border border-white bg-white">
                                <i class="fa fa-trash text-danger"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection
@include('admin::modal.modalCustomer')
@include('admin::ajax.ajaxCustomer')
{{-- @include('admin::ajax.view') --}}
