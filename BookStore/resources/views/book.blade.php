@extends('layouts.master')
@section('header_CSS')
<link rel="stylesheet" href="{{asset('FrontEnd/assets/css/collection_style.scss.css')}}" />
    
@endsection
@section('title')
    {{ isset($category->category_slug)
        ? $category->category_name
        : (Request()->is('*/sach-noi-bat')
            ? 'Sách nổi bật'
            : 'Tất cả sách') }}
@endsection
@section('content')
    @include('layouts.breadcrumb', [
        'link' => isset($category->category_slug)
            ? $category->category_name
            : (Request()->is('*/sach-noi-bat')
                ? 'Sách nổi bật'
                : 'Tất cả sách')
    ])
    <div class="container">
        <div class="row">
            <div class="bg_collection">
                <div
                    class="main_container collection col-lg-9 col-md-9 col-lg-9-fix padding-col-left-0 col-lg-push-3 col-md-push-3">
                    <h1 class="title_page">
                        {{ isset($category->category_slug)
                            ? $category->category_name
                            : (Request()->is('*/sach-noi-bat')
                                ? 'Sách nổi bật'
                                : 'Tất cả sách') }}
                    </h1>
                    <div class="category-products products">
                        <div class="sortPagiBar">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-lg-6 col-md-6">
                                    <div class="view-mode hidden-xs">
                                        
                                        <a href='{{ "$url?view=grid" }}' data-view="grid">
                                            <div
                                                class="btn button-view-mode view-mode-grid
                                                {{ (Request()->get('view') == 'grid' or Request()->get('view') == '') ? 'active' : false }}

                                        ">
                                                {{-- {{Request()->is("*/sach-noi-bat")}} --}}
                                                <i class="fa fa-th-large" aria-hidden="true"></i>
                                            </div>
                                        </a>
                                        <a href='{{ "$url?view=list" }}' data-view="list">
                                            <div
                                                class="btn button-view-mode view-mode-list
                                        {{ Request()->get('view') == 'list' ? 'active' : false }}
                        
                                        ">
                                                <i class="fa fa-list" aria-hidden="true"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                {{-- {{ URL::current() }} --}}
                                <div class="col-xs-12 col-sm-6 col-lg-6 col-md-6 text-xs-left text-sm-right">
                                    <div id="sort-by" class="sortpage">
                                        <label class="left">Sắp xếp: </label>
                                        <ul>
                                            <li>
                                                <span>Thứ tự</span>
                                                <ul>
                                                    <li>
                                                        <a href='{{ (Request()->get('view') == 'grid' or Request()->get('view') == '') ? "$url?view=grid" : false }}
                                                                                            {{ Request()->get('view') == 'list' ? "$url?view=list" : false }}
                                                                                            '>Mặc định
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href='{{ (Request()->get('view') == 'grid' or Request()->get('view') == '') ? "$url?view=grid&sort=alpha-asc" : false }}
                                                                                        {{ Request()->get('view') == 'list' ? "$url?view=list&sort=alpha-asc" : false }}
                                                                                        ' onclick="sortby('alpha-asc')">A
                                                            &rarr;Z</a>
                                                    </li>
                                                    <li>
                                                        <a href=' {{ (Request()->get('view') == 'grid' or Request()->get('view') == '')? "$url?view=grid&sort=alpha-desc": false }}
                                                                                    {{ Request()->get('view') == 'list' ? "$url?view=list&sort=alpha-desc" : false }}
                                                                                    ' onclick="sortby('alpha-desc')">Z
                                                            &rarr;A</a>
                                                    </li>
                                                    <li>
                                                        <a href='  {{ (Request()->get('view') == 'grid' or Request()->get('view') == '') ? "$url?view=grid&sort=price-asc" : false }}
                                                                                    {{ Request()->get('view') == 'list' ? "$url?view=list&sort=price-asc" : false }}
                                                                                    ' onclick="sortby('price-asc')">Giá
                                                            tăng dần</a>
                                                    </li>
                                                    <li>
                                                        <a href=' {{ (Request()->get('view') == 'grid' or Request()->get('view') == '')? "$url?view=grid&sort=price-desc": false }}
                                                                                    {{ Request()->get('view') == 'list' ? "$url?view=list&sort=price-desc" : false }}
                                                                                    ' onclick="sortby('price-desc')">Giá
                                                            giảm dần</a>
                                                    </li>
                                                    <li>
                                                        <a href='{{ (Request()->get('view') == 'grid' or Request()->get('view') == '')? "$url?view=grid&sort=created-desc": false }}
                                                                                    {{ Request()->get('view') == 'list' ? "$url?view=list&sort=created-desc" : false }}
                                                                                    ' onclick="sortby('created-desc')">Hàng
                                                            mới nhất</a>
                                                    </li>
                                                    <li>
                                                        <a href='  {{ (Request()->get('view') == 'grid' or Request()->get('view') == '')? "$url?view=grid&sort=created-asc": false }}
                                                                                    {{ Request()->get('view') == 'list' ? "$url?view=list&sort=created-asc" : false }}
                                                                                    ' onclick="sortby('created-asc')">Hàng
                                                            cũ nhất</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- {{URL::current()}} --}}
                        <!-- Grid -->
                        <section class="products-view products-view-grid" style="display:
                                        {{ (Request()->get('view') == 'grid' or Request()->get('view') == '') ? 'block' : 'none' }}
                                                                ">
                            <div class="row">
                                @if (isset($book))
                                    @foreach ($book as $item)
                                        <!-- 12 -->
                                        <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 product-col"
                                            style="{{ $item->status == 0 ? 'pointer-events: none !important;' : false }}">
                                            <div class="item_product_main margin-bottom-20 item_product_main_relative">
                                                <div class="product-item-main">
                                                    <div class="product-thumbnail">
                                                        <a class="image_thumb p_img" href="{{route('bookDetailsFE',['book_slug'=>$item->book_slug])}}"
                                                            title="{{ $item->book_name }}">
                                                            <img class="img-responsive lazyload" width="10" height="10"
                                                                src="{{ isset($item->avatar) ? asset("images/book/$item->avatar") : asset('images/default.jpg') }}"
                                                                alt="{{ $item->book_name }}" />
                                                        </a>

                                                        <button title="Xem nhanh" value="{{$item->book_slug}}"
                                                            class="xem_nhanh btn-circle btn_view btn right-to quick-view hidden-xs hidden-sm">
                                                            
                                                            <i class="fa fa-eye"></i>
                                                        </button>

                                                    </div>
                                                    <div class="product-info product-bottom mh">
                                                        <h3 class="product-name" style="pointer-events: auto">
                                                            <a href="{{route('bookDetailsFE',['book_slug'=>$item->book_slug])}}"
                                                                title="{{ $item->book_name }}">{{ $item->book_name }}</a>
                                                        </h3>
                                                        <div class="section">
                                                            <div class="blockprice">
                                                                <div class="product-item-price price-box">
                                                                    <span class="price product-price"><span
                                                                            class="money">{{ $item->price -3000 }}</span>₫</span>
                                                                    <span
                                                                        class="compare-price price product-price-old"><span
                                                                            class="money">{{ $item->price }}</span>₫</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-action clearfix">
                                                            <input type="hidden" value="1" id="qtym">

                                                            <form  class="variants form-nut-grid">
                                                                <div class="group_action">
                                                                    {{-- <input type="hidden" name="variantId" value="" /> --}}
                                                                    <button value="{{$item->book_slug}}" class="btn-buy firstb btn-cart
                                                                    button_35 left-to muangay add_to_cart" data-url="{{ route('addToCart', ['id' => $item->id]) }}"
                                                                    data-id="{{ $item->id}}"
                                                                        style="{{ $item->status == 0 ? 'pointer-events: none !important;' : false }}"
                                                                        title="{{ $item->status == 1 ? 'Thêm giỏ hàng' : 'Hết hàng' }}">{{ $item->status == 1 ? 'Thêm giỏ hàng' : 'Hết hàng' }}
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- 12 -->
                                    @endforeach
                                @endif


                                <!-- 12 -->
                            </div>
                            {{-- {{dd($book->count())}} --}}
                            <div class="text-paginate" style="display: {{ $book->hasPages() ? 'block' : 'none' }}">
                                <nav class="clearfix relative nav_pagi f-right w_100">
                                    @if (isset($book))
                                        {{ $book->appends(Request::all())->links('layouts.paginate') }}
                                    @endif

                                </nav>
                            </div>
                            <!-- Grid -->
                        </section>

                        <!-- List -->
                        <section class="products-view products-view-list" style="display:
                                                                {{ Request()->get('view') == 'list' ? 'block' : 'none' }}
                                                                ">
                            <div class="row">
                                @if (isset($book))
                                    @foreach ($book as $item)
                                        <!-- 12 -->
                                        <div class="col-xs-12 item_list"
                                            style="{{ $item->status == 0 ? 'pointer-events: none !important;' : false }}">
                                            <div class="product-box product-item-list">
                                                <div class="product-image">
                                                    <a class="image_thumb" href="{{route('bookDetailsFE',['book_slug'=>$item->book_slug])}}" title="{{ $item->book_name }}">
                                                        <img class="small-image lazyload loaded"
                                                            src="{{ isset($item->avatar) ? asset("images/book/$item->avatar") : asset('images/default.jpg') }}"
                                                            alt="{{ $item->book_name }}" />
                                                    </a>

                                                    <button title="Xem nhanh" value="{{$item->book_slug}}"
                                                        class="xem_nhanh btn-circle btn_view btn right-to quick-view hidden-xs hidden-sm">
                                                        
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </div>
                                                <div class="product-shop">
                                                    <h3 class="product-name" style="pointer-events: auto">
                                                        <a href="{{route('bookDetailsFE',['book_slug'=>$item->book_slug])}}"
                                                            title="{{ $item->book_name }}">{{ $item->book_name }}</a>
                                                    </h3>
                                                    <div class="product-type">
                                                        <span class="vends">Nhà xuất bản:</span>

                                                        <span
                                                            class="name_vend">{{ isset($item->NXB) ? $item->NXB : 'Đang cập nhật' }}
                                                        </span>

                                                        <span class="vends margin-left-10">Thể loại:</span>

                                                        <span class="name_vend">{{ $item->category_name }} </span>
                                                    </div>
                                                    <div class="product-item-price price-box">
                                                        <span class="special-price">
                                                            <span class="price product-price">
                                                                <span class="price product-price"><span
                                                                        class="money">{{ $item->price -3000 }}</span>₫</span>
                                                            </span>

                                                            <span class="product-item-price-sale old-price">
                                                                <span class="compare-price price product-price-old"><span
                                                                        class="money">{{ $item->price }}</span>₫</span>
                                                            </span>
                                                    </div>
                                                    <div class="product-summary">
                                                        <span class="text2line">

                                                            {!! isset($item->description) ? $item->description : 'Nội dung đang được cập nhật' !!}

                                                        </span>
                                                    </div>

                                                    <div class="product-action clearfix">
                                                        <input type="hidden" value="1" id="qtym">

                                                        <form class="variants form-nut-grid">
                                                            <div class="group_action">
                                                                <button value="{{$item->book_slug}}" class="btn-buy firstb btn-cart
                                                                    button_35 left-to muangay add_to_cart" data-url="{{ route('addToCart', ['id' => $item->id]) }}"
                                                                    data-id="{{ $item->id}}"
                                                                        style="{{ $item->status == 0 ? 'pointer-events: none !important;' : false }}"
                                                                        title="{{ $item->status == 1 ? 'Thêm giỏ hàng' : 'Hết hàng' }}">{{ $item->status == 1 ? 'Thêm giỏ hàng' : 'Hết hàng' }}
                                                                    </button>
                                                                
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- 12 -->
                                    @endforeach
                                @endif


                                <!-- 12 -->


                            </div>
                            <div class="shop-pag text-right"
                                style="display: {{ $book->hasPages() ? 'block' : 'none' }}">
                                <nav class="clearfix relative nav_pagi f-right w_100">
                                    @if (isset($book))
                                        {{ $book->appends(Request::all())->links('layouts.paginate') }}
                                    @endif
                                </nav>
                            </div>
                        </section>

                        <!-- List -->
                    </div>
                </div>
                <aside class="sidebar left-content col-lg-3 col-lg-3-fix col-md-3 col-lg-pull-9 col-md-pull-9">
                    <div class="wrap_background_aside asidecollection">
                       @include('layouts.list')
                        <div class="aside-item banner-collection hidden-sm">
                            @if (isset($adsLeft))
                                
                            <a href="{{ isset($adsLeft->avatar) ? asset("images/ads/$adsLeft->avatar") : 
                            asset('images/default.jpg') }}" title="{{$adsLeft->title}}">
                                <img class="lazyload" src="{{isset($adsLeft->avatar) ? 
                                asset('images/ads/'.$adsLeft->avatar) :asset('images/default.jpg')}}"
                                    alt="{{$adsLeft->title}}" />
                            </a>
                            @endif
                        </div>
                        <div class="section_product_hot">
                            <div class="aside-item aside-mini-list-product">
                                <div class="left-content">
                                    <div class="aside-title">
                                        <h2 class="title-head margin-top-0 bookHot">
                                            <a href="javascript:void(0)" title="Sản phẩm hot">Sản phẩm hot</a>
                                        </h2>
                                    </div>
                                </div>
                                <div class="related-products">
                                    <div class="product-mini-lists">
                                        @if (isset($bookHot))
                                            @foreach ($bookHot as $item)
                                                <!-- Sản phẩm hot -->
                                                <div class="item_product_main">
                                                    <div class="product-box product-item-list product-main-list-mini">
                                                        <div class="product-image">
                                                            <a class="img_thumb" href="{{ route('bookDetailsFE', ['book_slug'=>$item->book_slug]) }}"
                                                                title="{{ $item->book_name }}">
                                                                <img class="small-image lazyload" src="
                                                                           {{ isset($item->avatar) ? asset("images/book/$item->avatar") : asset('images/default.jpg') }}
                                                                           " alt="{{ $item->book_name }}" />
                                                            </a>
                                                        </div>
                                                        <div class="product-shop">
                                                            <h3 class="product-name">
                                                                <a href="{{ route('bookDetailsFE', ['book_slug'=>$item->book_slug]) }}"
                                                                    title="{{ $item->book_name }}">{{ $item->book_name }}</a>
                                                            </h3>
                                                            <div class="product-summary">
                                                                <span class="text2line">
                                                                    {!! isset($item->description) ? $item->description : 'Mô tả sản phẩm đang được cập nhật' !!}

                                                                </span>
                                                            </div>
                                                            <div class="product-item-price price-box">
                                                                <span class="special-price">
                                                                    <span class="price product-price"><span
                                                                            class="money">{{ $item->price -3000 }}</span>₫</span>
                                                                </span>
                                                                <span class="product-item-price-sale old-price">
                                                                    <span
                                                                        class="compare-price price product-price-old"><span
                                                                            class="money">{{ $item->price }}</span>₫</span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Sản phẩm hot -->
                                            @endforeach
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
@endsection
