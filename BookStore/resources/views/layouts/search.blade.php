@extends('layouts.master')
@section('title')
    {{Request()->get('keyword')}}
@endsection
@section('content')
    <section class="signup search-main">
        @include('layouts.breadcrumb', ['link' => 'Tìm kiếm'])
        <div class="container">
            @if (empty($search))
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="bg-danger padding-15 margin-bottom-15 title-head title_no_search">
                            Không tìm thấy bất kỳ kết quả nào với từ khóa trên.
                        </h1>
                    </div>
                    <div class="col-xs-12">
                        <h2 class="title-head title_search">
                            <a href="#" class="title-box">Nhập từ khóa để tìm kiếm sản phẩm
                            </a>
                        </h2>
                    </div>

                    <form action="{{ route('search') }}" method="get" class="col-xs-12 form-signup">
                        
                        <fieldset class="form-group">
                            <input type="text" name="keyword" 
                                placeholder="Tìm kiếm ..." autocomplete="off" class="form-control form_search_h" required />

                            <button type="submit" class="btn-style btn-style-active btn btn-primary btn_search_h">
                                Tìm kiếm
                            </button>
                        </fieldset>
                    </form>
                </div>
            @else
                <div class="row">
                    <div class="col-xs-12 margin-bottom-15">
                        <h1 class="bg-success padding-15 margin-bottom-15 title-head title_search">
                            Có <b>{{count($search)}}</b> kết quả tìm kiếm với từ khoá <b>"{{ Request()->get('keyword') }}"</b>
                        </h1>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-bottom-30">
                        <div class="products-view-gridsss products cls_search list_hover_pro">
                            <div class="row content_col">
                                @if (isset($search))
                                    @foreach ($search as $item)
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 margin-bottom-20"
                                            style="{{ $item->status == 0 ? 'pointer-events: none !important;' : false }}">
                                            <div class="item_product_main item_product_main_relative">
                                                <div class="item">
                                                    <div class="product-box product-item-main product-item-compare">
                                                        <div class="product-thumbnail">
                                                            <a class="image_thumb p_img thumb_search" href="javascript:void(0)"
                                                                title="{{$item->book_name}}">
                                                                <img class="img-responsive lazyload loaded"
                                                                    src="{{ isset($item->avatar) ? asset("images/book/$item->avatar") : asset('images/default.jpg') }}"
                                                                    alt="" data-was-processed="true" />
                                                            </a>

                                                            <button title="Xem nhanh" value="{{$item->book_slug}}"
                                                                class="xem_nhanh btn-circle btn_view btn right-to quick-view hidden-xs hidden-sm">
                                                                
                                                                <i class="fa fa-eye"></i>
                                                            </button>
                                                        </div>
                                                        <div class="product-info product-bottom mh">
                                                            <h3 class="product-name" style="pointer-events: auto">
                                                                <a href="#"
                                                                    title="{{ $item->book_name }}">{{ $item->book_name }}</a>
                                                            </h3>

                                                            <div class="section">
                                                                <div class="blockprice">
                                                                    <div class="product-item-price price-box">
                                                                        <span class="special-price">
                                                                            <span class="price product-price"><span
                                                                                    class="money">{{ $item->price * 0.8 }}</span>₫</span>
                                                                        </span>

                                                                        <span class="product-item-price-sale old-price">
                                                                            <span
                                                                                class="compare-price price product-price-old"><span
                                                                                    class="money">{{ $item->price }}</span>₫</span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="product-action clearfix">
                                                                <form action="/cart/add" method="post"
                                                                    class="variants form-nut-grid"
                                                                    data-id="product-actions-1200896"
                                                                    enctype="multipart/form-data">
                                                                    <div class="group_action">
                                                                        <input type="hidden" name="variantId"
                                                                            value="1857538" />
                                                                            <a class="btn-buy firstb btn-cart button_35 left-to muangay add_to_cart"
                                                                            title="{{$item->status==1?"Thêm giỏ hàng":'Hết hàng'}}">
                                                                            {{$item->status==1?"Thêm giỏ hàng":'Hết hàng'}}
                                                                        </a>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                            </div>

                        </div>

                    </div>

                </div>
            @endif


        </div>
        @if (isset($search))
            <div class="shop-pag text-right" style="display: {{ $search->hasMorePages() ? 'block' : 'none' }}">
                <nav class="clearfix relative nav_pagi f-right w_100">
                    @if (isset($search))
                        {{ $search->appends(Request::all())->links('layouts.paginate') }}
                    @endif
                </nav>
            </div>
        @endif
    </section>
@endsection
