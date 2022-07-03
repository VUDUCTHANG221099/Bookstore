@extends('admin::layouts.master',['link'=>'Sách']) @section('breadcrumb_sub')
<li class="breadcrumb-item active">Sách</li>

@endsection @section('title', 'Sách') @section('content')
<div class="container mb-3">
    <button class="btn btn-primary addBook float-right">
        Thêm sách
        <i class="fa fa-plus"></i>
    </button>
</div>
<div class="container">
    <table class="datatable">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên sách</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Tác giả</th>
                <th>Thể loại</th>
                <th>Hình ảnh</th>
                <th>Trạng thái</th>
                <th class="text-center">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($book as $item)
            <tr>
                <td>{{ $count++ }}</td>
                <td title="{{ $item->book_name }}">
                    {{
                        ($str::length($item->book_name) > 10
                        ? $str::words($item->book_name, 1, '...')
                        : $item->book_name)
    
                    }}
                    </td>
                <td class="money">{{  $item->quantity }}</td>
                <td><span class="money">{{ $item->price }}</span>đ</td>
                <td title="{{ $item->author_name}}">
                    {{
                        ($str::length($item->author_name) > 10
                        ? $str::words($item->author_name, 2, '...')
                        : $item->author_name)
    
                    }}
                    </td>
                <td title="{{$item->category_name}}">
                    {{
                        ($str::length($item->category_name) > 10
                        ? $str::words($item->category_name, 3, '...')
                        : $item->category_name)
    
                    }}
                    {{-- {{ $item->category_name }} --}}
                </td>



                <td>
                    <img src="{{ isset($item->avatar) ? asset('images/book/' . $item->avatar) : 
                        asset('images/default.jpg') }}" alt="" width="100px" height="100px" />
                </td>
                <td>
                    {!!($item->status==1 && $item->quantity>0)?'<span class="btn btn-primary" style="cursor: default;">Còn sách</span>
                    ':'<span class="btn btn-danger" style="cursor: default;">Hết sách</span>'!!}
                </td>

                <td class="text-center">
                    <a href="{{ route('bookDetails', ['slug'=>$item->book_slug]) }}" class="border border-white">
                        <i class="fa fa-eye text-blue"></i>
                    </a>
                    <a href="{{route('getBook',['slug'=>$item->book_slug])}}" class="border border-black bg-white">
                        <i class="fa fa-edit"></i>
                    </a>
                    <button value="{{ $item->book_slug }}" class="RemoveBook border border-white bg-white" >
                        <i class="fa fa-trash text-danger"></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection 
@include('admin::modal.modalBook')
@include('admin::ajax.ajaxBook') 
{{-- @include('admin::ajax.view') --}}