@extends('layouts.master')
@section('title')
    {{ $bookDetails->book_name }}
@endsection
@section('content')
    @if (isset($bookDetails))
        @section('breadcrumd_sub')
            <li>
                <a href="{{ route('book', ['slug' => $bookDetails->category_slug]) }}" class="post">

                    <span>{{ $bookDetails->category_name }}</span>
                    <span class="mr_lr">&nbsp;<i class="fa fa-angle-right"></i>&nbsp;</span>
                </a>
            </li>
        @endsection
        @include('layouts.breadcrumb', ['class' => 'post', 'link' => $bookDetails->book_name])
    @endif
    <section class="product margin-top-10 f-left w_100+">
        <div class="container">
            <div class="row">
                <div class="section">
                    <div class="details-product section">
                        <div class="product-detail-left product-images col-xs-12 col-sm-12 col-md-3 col-lg-3">
                            <div class="col_large_default large-image">
                                <span class="product-details-item-sale"></span>

                                <a href="{{ isset($bookDetails->avatar) ? asset("images/book/$bookDetails->avatar") : asset('images/default.jpg') }}"
                                    data-rel="prettyPhoto[product-gallery]">
                                    <div style="height: 349px; width: 270px" class="zoomWrapper">
                                        <div style="height: 349px; width: 270px" class="zoomWrapper">
                                            <img class="checkurl img-responsive" id="img_01"
                                                src="{{ isset($bookDetails->avatar) ? asset("images/book/$bookDetails->avatar") : asset('images/default.jpg') }}"
                                                alt="{{ $bookDetails->book_name }}" style="position: absolute" />
                                        </div>
                                    </div>
                                </a>


                            </div>

                            <div id="gallery_02"
                                class="owl-carousel owl-theme thumbnail-product thumb_product_details not-dqowl owl-loaded owl-drag"
                                data-loop="false" data-lg-items="3" data-md-items="3" data-sm-items="3" data-xs-items="3"
                                data-xxs-items="3">
                                <div class="owl-stage-outer owl-height" style="height: 60px">
                                    <div class="owl-stage" style="
                                        transform: translate3d(0px, 0px, 0px);
                                        transition: all 0s ease 0s;
                                        width: 151px;
                                    ">
                                        <div class="owl-item active" style="width: 65.333px; margin-right: 10px">
                                            <div class="item">
                                                <a href="javascript:void(0)">
                                                    <img class="lazyload loaded"
                                                        src="{{ isset($bookDetails->avatar) ? asset("images/book/$bookDetails->avatar") : asset('images/default.jpg') }}"
                                                        alt="{{ $bookDetails->book_name }}" data-was-processed="true" />
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                {{-- <div class="owl-nav disabled">
                                <div class="owl-prev disabled">prev</div>
                                <div class="owl-next disabled">next</div>
                            </div>
                            <div class="owl-dots disabled"></div> --}}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 details-pro">
                            <h1 class="title-product">{{ $bookDetails->book_name }}</h1>
                            <div class="fw w_100" itemprop="offers" itemscope="" itemtype="https://schema.org/Offer">
                                <div class="group-status">
                                    <span class="first_status margin-bottom-10">Tình trạng:

                                        <span class="status_name availabel">
                                            <link itemprop="availability" href="http://schema.org/InStock" />
                                            {{ $bookDetails->status == 1 ? 'Còn hàng' : 'Hết hàng' }}
                                        </span>
                                    </span>
                                    <span>&nbsp;|&nbsp;</span>

                                    <span class="first_status">Loại:
                                        <span class="status_name"> {{ $bookDetails->category_name }} </span></span>

                                </div>

                                <div class="price-box">
                                    <span class="special-price"><span class="price product-price"><span
                                                class="money">{{ $bookDetails->price -3000 }}</span>₫</span>

                                    </span>
                                    <!-- Giá Khuyến mại -->
                                    <span class="old-price" itemprop="priceSpecification" itemscope=""
                                        itemtype="https://schema.org/priceSpecification">
                                        <del class="price product-price-old sale"><span
                                                class="money">{{ $bookDetails->price }}</span>₫</del>

                                    </span>
                                    <!-- Giá gốc -->
                                </div>

                                <div class="product-summary">
                                    <div class="rte text3line">
                                        <em>
                                            {!! $bookDetails->description ? $bookDetails->description : ' (Nội dung đang cập nhật)' !!}

                                        </em>
                                    </div>
                                </div>
                            </div>
                            <div class="form-product">
                                <div class="form-group form_button_details">
                                    <div class="form_product_content">
                                        <div class="soluong show">
                                            <div class="custom input_number_product custom-btn-number form-control">
                                                <button class="btn_num num_1 button button_qty" onclick="var result = document.getElementById('qtymDetals');
                                                         var qtymDetals = result.value; if( !isNaN( qtymDetals ) && qtymDetals > 1 )
                                                          result.value--;return false;" type="button">
                                                    -
                                                </button>
                                                <input type="text" id="qtymDetals" maxlength="3" name="quantity"
                                                    value="1" class="form-control prd_quantity"
                                                    onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;"
                                                    onchange="if(this.value == 0)this.value=1;" />
                                                <button class="btn_num num_2 button button_qty"
                                                    onclick="var result = document.getElementById('qtymDetals');
                                                        var qtymDetals = result.value; if( !isNaN( qtymDetals )) result.value++;return false;" type="button">
                                                    +
                                                </button>
                                            </div>
                                        </div>

                                        <div class="button_actions clearfix">
                                            <button value="{{ $bookDetails->book_slug }}"
                                                data-url="{{ route('addToCart', ['id' => $bookDetails->id]) }}"
                                                style="{{ $bookDetails->status == 0 ? 'pointer-events: none !important;' : false }}"
                                                data-id="{{ $bookDetails->id}}"

                                                class="btn btn_base   add_to_cart add_to_cartDetals">
                                                <span
                                                    class="text_1">{{ $bookDetails->status == 1 ? 'Thêm giỏ hàng' : 'Hết hàng' }}</span>
                                            </button>


                                        </div>
                                    </div>
                                </div>

                                <div class="sp_details">
                                    Gọi ngay <a href="tel:18006750">1800 6750</a> để được tư
                                    vấn miễn phí
                                </div>


                            </div>
                        </div>
                      
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="owl_nav_custome1 related-product">
                                <div class="section_prd_feature">
                                    <div class="heading">
                                        <h2>
                                            <a href="{{ route('book', ['slug' => $bookDetails->category_slug]) }}"
                                                title="{{ $bookDetails->category_name }}">Sách tương tự</a>
                                        </h2>
                                    </div>

                                    <div class="products product_related products-view-grid-bb">
                                        @if (isset($bookSimilar) and count($bookSimilar) > 0)
                                            @foreach ($bookSimilar as $item)
                                                <div class="item_product_main related-item">
                                                    <div class="product-box product-item-list product-main-list-mini">
                                                        <div class="product-image">
                                                            <a class="img_thumb"
                                                                href="{{ route('bookDetailsFE', ['book_slug' => $item->book_slug]) }}"
                                                                title="{{ $item->book_name }}">
                                                                <img class="small-image lazyload loaded"
                                                                    src="{{ isset($item->avatar) ? asset("images/book/$item->avatar") : asset('images/default.jpg') }}"
                                                                    alt="{{ $item->book_name }}"
                                                                    data-was-processed="true" />
                                                            </a>
                                                        </div>
                                                        <div class="product-shop">
                                                            <h3 class="product-name">
                                                                <a href="{{ route('bookDetailsFE', ['book_slug' => $item->book_slug]) }}"
                                                                    title="{{ $item->book_name }}">{{ $item->book_name }}</a>
                                                            </h3>
                                                            <div class="product-summary">
                                                                <span class="text2line">
                                                                    {!! $item->description ? $item->description : ' <em>Nội dung đang cập nhật</em>' !!}
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
                                            @endforeach
                                        @else
                                            <p>Không có sách tương tự</p>
                                        @endif




                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('bookdetails.content')
                </div>

                <div class="section_product_deal_hot">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="aside-mini-list-product">
                            <div class="heading">
                                <h2 class="title-head bookHot">
                                    <a href="javascript:void(0)" title="Sách nổi bật">Sách nổi bật</a>
                                </h2>
                            </div>
                            <div class="product-new">
                                <!-- Sản phẩm mới 4 -->
                                @if (isset($bookHot) and count($bookHot) > 0)
                                    @foreach ($bookHot as $item)
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 col-product"
                                            style="{{ $item->status == 0 ? 'pointer-events: none !important;' : false }}">
                                            <div class="item_product_main margin-bottom-20 item_product_main_relative">
                                                <div class="product-item-main">
                                                    <div class="product-thumbnail">
                                                        <a class="image_thumb p_img"
                                                            href="{{ route('bookDetailsFE', ['book_slug' => $item->book_slug]) }}"
                                                            title="{{ $item->book_name }}">
                                                            <img class="img-responsive lazyload" width="10" height="10"
                                                                src="{{ isset($item->avatar) ? asset("images/book/$item->avatar") : asset('images/default.jpg') }}"
                                                                alt="{{ $item->book_name }}" />
                                                        </a>

                                                        <button title="Xem nhanh" value="{{ $item->book_slug }}"
                                                            class="xem_nhanh btn-circle btn_view btn right-to quick-view hidden-xs hidden-sm">

                                                            <i class="fa fa-eye"></i>
                                                        </button>

                                                    </div>
                                                    <div class="product-info product-bottom mh">
                                                        <h3 class="product-name" style="pointer-events: auto">
                                                            <a href="{{ route('bookDetailsFE', ['book_slug' => $item->book_slug]) }}"
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
                                                            <input type="hidden" value="1" id="qtym" name="quality">

                                                            <form class="variants form-nut-grid">
                                                                <div class="group_action">

                                                                    <button type="submit" data-url="
                                                                        {{ route('addToCart', ['id' => $item->id]) }}"
                                                                        class="btn-buy firstb btn-cart
                                                                button_35 left-to muangay add_to_cart"
                                                                data-id="{{ $item->id}}"

                                                                        title=" Thêm giỏ hàng">Thêm giỏ hàng
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        {{-- <div class="product-action clearfix">
                                                            <input type="hidden" value="1" id="qtym" name="quality">

                                                            <form class="variants form-nut-grid">
                                                                <div class="group_action">
                                                            
                                                                    <button value="{{ $item->book_slug }}"
                                                                        class="btn-buy firstb btn-cart
                                                                        button_35 left-to muangay add_to_cart"
                                                                        data-url="{{ route('addToCart', ['id' => $item->id]) }}"
                                                                        style="{{ $item->status == 0 ? 'pointer-events: none !important;' : false }}"
                                                                        title="{{ $item->status == 1 ? 'Thêm giỏ hàng' : 'Hết hàng' }}">{{ $item->status == 1 ? 'Thêm giỏ hàng' : 'Hết hàng' }}
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p>Không có sách nổi bật</p>
                                @endif
                                <!-- Sản phẩm mới 4 -->


                                <!-- Sản phẩm mới 4 -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </section>

    @include('bookdetails.zoomBook')
@endsection
@section('footer_JS')
    <script src="{{ asset('FrontEnd/assets/js/owlcarousel.js') }}"></script>
    <script src="{{ asset('FrontEnd/assets/js/jquery.elevatezoom308.min.js') }}"></script>
    {{-- <script src="{{ asset('FrontEnd/assets/js/jquery.prettyphoto.init.min367a.js') }}"></script> --}}
@endsection
