@extends('admin::layouts.master',['link'=>'Đơn vị vận chuyển'])
@section('breadcrumb_sub')
    <li class="breadcrumb-item active">Đơn vị vận chuyển</li>

    @endsection @section('title', 'Đơn vị vận chuyển') 
    @section('content')
    @section('css')
    <!--Upload Avatar-->
    <link rel="stylesheet" href="{{ asset('assets/upload/css/image.css') }}" />
    <!--Upload Avatar-->
    @endsection
    <div class="container mb-3">
        <button class="btn btn-primary float-right addShipper">
            Thêm Đơn vị vận chuyển
            <i class="fa fa-plus"></i>
        </button>
    </div>
   
    <div class="container">
        <table class="datatable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Đơn vị vận chuyển</th>
                    <th>Logo</th>
                    
                    <th class="text-center">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($shipper))
                    
                @foreach ($shipper as $item)
                    <tr>
                        <td>{{ $count++ }}</td>
                        <td>{{ $item->shipper_name }}</td>
                        
                        <td>
                            
                            <img src="{{ isset($item->logo) ? asset('images/shipper/' . $item->logo) : 
                            asset('images/default.jpg') }}"
                                alt="{{ $item->shipper_name}}" width="100px" height="100px" />
                        </td>
                        <td class="text-center">
                            <button value="{{ $item->slug }}" class="EyeShipper border border-white bg-white">
                                <i class="fa fa-eye text-blue"></i>
                            </button>
                            {{-- <button value="{{ $item->id }}" class="EditShipper border border-white">
                                <i class="fa fa-edit"></i>
                            </button> --}}
                            <button value="{{ $item->slug }}" class="RemoveShipper border border-white bg-white">
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
@include('admin::modal.modalShipper') 
@section('js')
<!--Upload Image-->
<script src="{{ asset('assets/upload/js/image.js') }}"></script>

<!--Upload Avatar-->
@endsection
@include('admin::ajax.ajaxShipper') 
