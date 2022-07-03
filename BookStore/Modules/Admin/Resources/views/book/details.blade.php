{{-- {{dd($book)}} --}}
@extends('admin::layouts.master',['link'=>"Sách $book->book_name"])
@section('breadcrumb_sub')
    <li class="breadcrumb-item"><a href="javascript:void(0)" class="admin_book">Sách</a></li>
    <li class="breadcrumb-item active">Sách {{ $book->book_name }}</li>

@endsection


@section('title', "Sách $book->book_name")

@section('content')
    <div class="container row">

        <div class="col">
            <div class="card">
                <h2><span class="font-weight-bold">Sách:</span> <span
                        class="text-cyan">{{ $book->book_name }} </span></h2>
                <img class="card-img-top"
                    src="{{ isset($book->avatar) ? asset('images/book/' . $book->avatar) : asset('images/default.jpg') }}"
                    alt="Card image cap">
                <div class="card-body">
                    <h3>
                        {{-- <span class="money">50000</span> --}}
                        <ul>
                            <li>
                                <p class="card-text ">Tác giả: <span class="text-cyan">
                                        <a href="{{ route('authorDetails', ['slug' => $book->author_slug]) }}">
                                            {{ $book->author }}
                                        </a>
                                    </span>
                                </p>
                            </li>
                            <li>
                                <p class="card-text">Thể loại: <span
                                        class="text-cyan">{{ $book->category }}</span>
                                </p>
                            </li>
                            <li>
                                <p class="card-text">Nhà xuất bản: <span
                                        class="text-cyan">{{ @$book->NXB ? $book->NXB : 'Chưa cập nhật' }}</span></p>
                            </li>
                            <li>
                                <p class="card-text">Số lượng: <span class="text-cyan">
                                        @if (isset($book->quantity) && $book->quantity > 0)
                                            <span class="money">{{ $book->quantity }}</span> quyển
                                        @else
                                            Hết sách
                                        @endif
                                    </span>
                                </p>
                            </li>
                            <li>
                                <p class="card-text">Giá tiền: <span class=" text-cyan">
                                        @if (isset($book->price) && $book->price > 0)
                                            <span class="money">{{ $book->price }}</span> đồng
                                        @else
                                            Chưa cập nhật
                                        @endif
                                    </span>
                                </p>
                            </li>
                            <li>
                                <p class="card-text">Số trang: <span class=" text-cyan">
                                        @if (isset($book->pages) && $book->pages > 0)
                                            <span class="money">{{ $book->pages }}</span> trang
                                        @else
                                            Chưa cập nhật
                                        @endif
                                    </span>
                                </p>
                            </li>
                            <li>
                                <p class="card-text">Trạng thái: <span class="text-cyan">
                                        {{ $book->status == 1 && $book->quantity > 0 ? 'Còn sách' : 'Không còn sách' }}</span>
                                </p>
                            </li>
                        </ul>

                    </h3>

                </div>
            </div>


        </div>
        <div class="col">



            <div class="card-head">
                <h4 class="font-italic font-weight-bold">Đôi nét về sách</h4>
            </div>
            <div class="card-body text-justify">

                {!! $book->description !!}

            </div>
        </div>
    </div>

    </div>
    </div>
@endsection

@include('admin::ajax.ajaxbook')
@include('admin::ajax.view')
