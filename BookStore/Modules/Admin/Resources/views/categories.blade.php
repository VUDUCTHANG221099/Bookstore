@extends('admin::layouts.master',['link'=>'Thể loại'])
@section('breadcrumb_sub')
    <li class="breadcrumb-item active">Thể loại</li>

    @endsection @section('title', 'Thể loại') @section('content')
    <div class="container mb-3">
        <button class="btn btn-primary float-right addCate">
            Thêm thể loại
            <i class="fa fa-plus"></i>
        </button>
    </div>
    <div class="container">

        <table class="datatable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Thể loại</th>
    
                    <th class="text-center">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $item)
                    <tr>
                        <td>{{ $count++ }}</td>
                        <td>{{ $item->category_name }}</td>
    
                        <td class="text-center">
                            <button value="{{ $item->category_slug }}" class="EyeCate border border-white bg-white">
                                <i class="fa fa-eye text-blue"></i>
                            </button>
                            <button value="{{ $item->category_slug }}" class="EditCate border border-white bg-white">
                                <i class="fa fa-edit"></i>
                            </button>
                            <button value="{{ $item->category_slug }}" class="RemoveCate border border-white bg-white">
                                <i class="fa fa-trash text-danger"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection
@include('admin::modal.modalCategory') 

@include('admin::ajax.ajaxCategory') 
{{-- @include('admin::ajax.view') --}}
