@extends('admin::layouts.master',['link'=>'Quản trị viên'])
@section('breadcrumb_sub')
    <li class="breadcrumb-item active">Quản trị viên</li>

    @endsection @section('title', 'Quản trị viên') 
    @section('content')

    <div class="container mb-3">
        <button class="btn btn-primary float-right addAdmin">
            Thêm quản trị viên
            <i class="fa fa-plus"></i>
        </button>
    </div>
   
    <div class="container">
        <table class="datatable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Họ và tên</th>
                    <th>Email</th>
                    <th>Avatar</th>
                    <th class="text-center">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                    <tr>
                        <td>{{ $count++ }}</td>
                        <td>{{ $item->full_name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            
                            <img src="{{ isset($item->avatar) ? asset('images/users' . $item->avatar) : 
                            asset('images/default.jpg') }}"
                                alt="" width="100px" height="100px" />
                        </td>
                        <td class="text-center">
                            <button value="{{ $item->id }}" class="EyeAdmin border border-white bg-white">
                                <i class="fa fa-eye text-blue"></i>
                            </button>
                            <button value="{{ $item->id }}" class="EditAdmin border border-white bg-white">
                                <i class="fa fa-edit"></i>
                            </button>
                            <button value="{{ $item->id }}" class="RemoveAdmin border border-white bg-white">
                                <i class="fa fa-trash text-danger"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @endsection
@include('admin::modal.modalAdmin') 
@include('admin::ajax.ajaxAdmin') 
