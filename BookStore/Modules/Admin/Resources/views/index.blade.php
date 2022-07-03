@extends('admin::layouts.master',['link'=>'Trang chủ'])

@section('title','Trang chủ')

@section('content')
<div class="container mb-3">
    <h3 class="float-right" id="total_book">
        
    </h3>
</div>
<div class="container">
    <h2 class="admin_order" style="cursor: pointer;">Các đơn hàng</h2>
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
<!--Tac gia-->
<div style="height:250px;;"></div>
<div class="container mb-3" style="display:none;">
   

    <div class="container">
        <h2 class="admin_author" style="cursor: pointer;">Tác giả</h2>
    

        <form action="" method="get">
            
            <div>
                <input  class="form-control"style="width:100%;" name="key" placeholder="Tìm kiếm theo tên tác giả">
            </div>
            
                <button 
                style="float:right; margin-right:0%; margin-top:-3.4%"
                type="submit" class="btn" class="form-control"><i class="fa fa-search fa-lg"></i></button>
            
        </form>
      </div>
</div>
<div class="container" style="display:none;">
    @if (@$author)
    @foreach ($author as $item)
    <div class="card" style="width: 15rem; display: inline-block; margin: auto 10px 10px">
        <img class="card-img-top" width="200px" height="200px" src="{{ isset($item->avatar) ? asset('images/author/' . $item->avatar) : 
                asset('images/default.jpg') }}" alt="Card image cap" />
        <div class="card-body">
            <h5 class="card-title"><span class="font-weight-bold">Tác giả</span>: {{$item->author_name}}</h5>
            <p class="card-text"><span class="font-weight-bold">Ngày sinh</span>: {{$carbon::parse($item->birth_date)->translatedFormat('d/m/Y')}}
                <br>
                <span class="font-weight-bold">    
                    Thể loại
                </span>:
                {{$item->category_name}}
            </p>
            
            <div>
                <a href="{{route('authorDetails',['slug' => $item->author_slug])}}" class="btn btn-primary">
                    Xem chi tiết</a>
                <a href="{{route('getAuthor',['slug' => $item->author_slug])}}" style="padding: 10px" class="btn btn-primary">
                    <i class="fa fa-edit"></i>
                </a>

                <button value="{{$item->author_slug}}" class="btn btn-danger RemoveAuthor" style="padding: 10px">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
        </div>
    </div>
    @endforeach
    @endif
</div>

<div class="container" style="display:none;">
    @if (@$author)

    <nav aria-label="Page navigation">
        {{$author->appends(Request::all())->links('admin::layouts.paginate') }}
        {{-- {{ $author->links('admin::layouts.paginate') }} --}}

    </nav>
    @endif
</div>
<!--Tac gia-->

{{-- {!!$post->description!!} --}}
@endsection
{{-- @include('admin::modal.modalOrder')
@include('admin::ajax.ajaxOrder') --}}
@include('admin::modal.modalAuthor') 
@include('admin::ajax.ajaxAuthor') 
