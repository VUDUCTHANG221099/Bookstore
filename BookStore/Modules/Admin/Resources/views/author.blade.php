@extends('admin::layouts.master',['link'=>'Tác giả']) @section('breadcrumb_sub')
<li class="breadcrumb-item active">Tác giả</li>

@endsection @section('title','Tác giả') @section('content')
<div class="container mb-3">
    <button class="btn btn-primary addAuthor float-right">
        Thêm tác giả
        <i class="fa fa-plus"></i>
    </button>

    <div class="container">
        <form action="" method="get">
            
            <div>
                <input  class="form-control"style="width:86%;" name="key" placeholder="Tìm kiếm theo tên tác giả">
            </div>
            
                <button 
                style="float:right; margin-right:13%; margin-top:-3.4%"
                type="submit" class="btn" class="form-control"><i class="fa fa-search fa-lg"></i></button>
            
        </form>
      </div>
</div>

<div class="container">
    @if (@$author)
    @foreach ($author as $item)
    <div class="card" style="width: 15rem; display: inline-block; margin: auto 10px 10px">
        <img class="card-img-top" width="200px" height="200px" src="{{ isset($item->avatar) ? asset('images/author/' . $item->avatar) : 
                asset('images/default.jpg') }}" alt="Card image cap" />
        <div class="card-body">
            <h5 class="card-title;" title="{{$item->author_name}}"><span class="font-weight-bold" >Tác giả</span>: 
                {{
                    ($str::length($item->author_name) > 10
                    ? $str::words($item->author_name, 1, '...')
                    : $item->author_name)

                }}
                </h5>
            
            <p class="card-text"><span class="font-weight-bold">Ngày sinh</span>: 
                {{$carbon::parse($item->birth_date)->translatedFormat('d/m/Y')}}
                <br>
                {{-- {{$item->category_name}} --}}
                <span title="{{$item->category_name}}">
    
                <span class="font-weight-bold">    
                    Thể loại
                </span>:
                {{
                    ($str::length($item->category_name) > 10
                    ? $str::words($item->category_name, 3, '...')
                    : $item->author_name)
    
                }}
                </span>
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

<div class="container">
    @if (@$author)

    <nav aria-label="Page navigation">
        {{$author->appends(Request::all())->links('admin::layouts.paginate') }}
        {{-- {{ $author->links('admin::layouts.paginate') }} --}}

    </nav>
    @endif
</div>

@endsection
@include('admin::modal.modalAuthor') 
@include('admin::ajax.ajaxAuthor') 