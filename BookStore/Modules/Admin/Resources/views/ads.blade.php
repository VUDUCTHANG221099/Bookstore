@extends('admin::layouts.master',['link'=>'Quảng cáo'])
@section('breadcrumb_sub')
<li class="breadcrumb-item active">Quảng cáo</li>

@endsection @section('title','Quảng cáo') @section('content') @section('css')
<!--Upload Avatar-->
<link rel="stylesheet" href="{{ asset('assets/upload/css/image.css') }}" />
<!--Upload Avatar-->
@endsection
<div class="container mb-3">
    <button class="btn btn-primary float-right addAds">
        Thêm quảng cáo
        <i class="fa fa-plus"></i>
    </button>
</div>

<div class="container">
    <table class="datatable">
        <thead>
            <tr>
                <th>#</th>
                <th>Tiêu đề</th>
                <th>Avatar</th>
                <th>Vị trí</th>
                <th class="text-center">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($ads)) @foreach ($ads as $item)
            <tr>
                <td>{{ $count++ }}</td>
                <td>{{ $item->title }}</td>

                <td>
                    <img src="{{ isset($item->avatar) ? asset('images/ads/' . $item->avatar) : 
                        asset('images/default.jpg') }}" alt="" width="100px" height="100px" />
                </td>
                <td>
                    @switch ($item->type)
                        @case(0) 
                            Banner bên trái
                            @break 
                        @case(1) 
                            Banner trung tâm
                            @break 
                        @case(2) 
                            Banner bên phải
                            @break 
                        @default 
                    
                    @endswitch
                </td>
                <td class="text-center">
                    <button value="{{ $item->slug }}" class="EyeAds border border-white bg-white">
                        <i class="fa fa-eye text-blue"></i>
                    </button>
                    <a href="{{ route('GetAdsUpdate', ['slug'=>$item->slug]) }}" class="border border-black bg-white">
                        <i class="fa fa-edit"></i></a>
                    <button value="{{ $item->slug }}" class="RemoveAds border border-white bg-white">
                        <i class="fa fa-trash text-danger"></i>
                    </button>
                </td>
            </tr>
            @endforeach @endif
        </tbody>
    </table>
</div>

@endsection @include('admin::modal.modalAds') 
@section('js')
<!--Upload Image-->
<script src="{{ asset('assets/upload/js/image.js') }}"></script>

<!--Upload Avatar-->
@endsection 
@include('admin::ajax.ajaxAds')