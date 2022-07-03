@extends('admin::layouts.master',['link'=>'Bài viết'])
@section('breadcrumb_sub')
    <li class="breadcrumb-item active">Bài viết</li>

    @endsection @section('title', 'Bài viết')
@section('content')



    <div class="container">
        <table class="datatable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên bài viết</th>
                    <th>Ngày giờ tạo</th>
                    <th>Người tạo</th>
                    <th class="text-center">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($post))
                    @foreach ($post as $item)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $carbon::parse($item->create_at)->translatedFormat('d/m/Y H:i:s') }}</td>
                            <td>{{ $item->full_name }}</td>
                            <td class="text-center"> <a href="{{ route('postDetails', ['slug'=>$item->slug]) }}"  class="border border-white">
                                <i class="fa fa-eye"></i>
                            </a>
                            <button value="{{ $item->slug }}" class="RemovePost border border-white bg-white ">
                                <i class="fa fa-trash text-danger"></i>
                            </button></td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

@endsection
@include('admin::modal.modalPost')
@include('admin::ajax.ajaxPost')