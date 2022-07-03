<div class="section section_tab_product">
    <div class="wrap_tab_index not-tab e-tabs">
        <div class="wrap_tab">
            <ul class="tabs tabs-title tabtitle1 ajax clearfix link_tab_check_click">
                <li class="tab-link tab_cate has-content" data-tab="tab-1">
                    <span>Bán chạy</span>
                </li>

                <li class="tab-link tab_cate" data-tab="tab-2">
                    <span>Nổi bật</span>
                </li>
            </ul>

            <div id="tab-1" class="tab-1 tab-content">
                <div class="products products-view-grid">
                    <!-- Sản phẩm bán chạy 4 -->

                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 col-product">
                        <div class="item">
                            <div class="item_product_main">
                                <div class="product-box product-item-main product-item-compare">
                                    <div class="product-thumbnail">
                                        <a class="image_thumb p_img" href="#" title="Đi qua hoa cúc">
                                            <img class="img-responsive lazyload" width="10" height="10"
                                                src="assets/images/di-qua-hoa-cuc-tai-ban--1-.jpg" alt="" />
                                        </a>

                                        <a title="Xem nhanh"
                                            class="xem_nhanh btn-circle btn_view btn right-to hidden-xs hidden-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                    <div class="product-info product-bottom mh">
                                        <h3 class="product-name">
                                            <a href="#" title="Đi qua hoa cúc">Đi qua hoa cúc</a>
                                        </h3>

                                        <div class="section">
                                            <div class="blockprice">
                                                <div class="product-item-price price-box">
                                                    <span class="price product-price">56.000₫</span>

                                                    <span class="compare-price price product-price-old">65.000₫</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-action clearfix">
                                            <form action="#" method="post" class="variants form-nut-grid"
                                                enctype="multipart/form-data">
                                                <div class="group_action">
                                                    <input type="hidden" name="variantId" value="" />
                                                    <a class="btn-buy firstb btn-cart button_35 left-to muangay add_to_cart"
                                                        title="Thêm vào giỏ">
                                                        Thêm vào giỏ
                                                    </a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Sản phẩm bán chạy 4 -->

                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 col-product">
                        <div class="item">
                            <div class="item_product_main">
                                <div class="product-box product-item-main product-item-compare">
                                    <div class="product-thumbnail">
                                        <a class="image_thumb p_img" href="#" title="Pippi tất dài">
                                            <img class="img-responsive lazyload" width="10" height="10"
                                                src="assets/images/pippi-tat-dai-tai-ban--1-.jpg" alt="" />
                                        </a>

                                        <a title="Xem nhanh"
                                            class="xem_nhanh btn-circle btn_view btn right-to hidden-xs hidden-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                    <div class="product-info product-bottom mh">
                                        <h3 class="product-name">
                                            <a href="#" title="Pippi tất dài">Pippi tất dài</a>
                                        </h3>

                                        <div class="section">
                                            <div class="blockprice">
                                                <div class="product-item-price price-box">
                                                    <span class="price product-price">57.000₫</span>

                                                    <span class="compare-price price product-price-old">76.000₫</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-action clearfix">
                                            <form action="#" method="post" class="variants form-nut-grid"
                                                enctype="multipart/form-data">
                                                <div class="group_action">
                                                    <input type="hidden" name="variantId" value="" />
                                                    <a class="btn-buy firstb btn-cart button_35 left-to muangay add_to_cart"
                                                        title="Thêm vào giỏ">
                                                        Thêm vào giỏ
                                                    </a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sản phẩm bán chạy 4 -->
                </div>
            </div>

            <div id="tab-2" class="tab-2 tab-content">
                <div class="products products-view-grid">
                    <!-- Sản phẩm nổi bật 4 -->

                    @if (isset($bookHot))
                        @foreach ($bookHot as $item)
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 col-product">
                                <div class="item">
                                    <div class="item_product_main">
                                        <div class="product-box product-item-main product-item-compare">
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
                                                <h3 class="product-name">
                                                    <a href="{{ route('bookDetailsFE', ['book_slug' => $item->book_slug]) }}"
                                                        title="{{ $item->book_name }}">{{ $item->book_name }}</a>
                                                </h3>

                                                <div class="section">
                                                    <div class="blockprice">
                                                        <div class="product-item-price price-box">
                                                            <span class="price product-price"><span
                                                                    class="money">{{ $item->price -3000 }}</span>₫</span>

                                                            <span class="compare-price price product-price-old"><span
                                                                    class="money">{{ $item->price }}</span>₫</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-action clearfix">
                                                    <form action="#" method="post" class="variants form-nut-grid"
                                                        enctype="multipart/form-data">
                                                        <div class="group_action">
                                                            {{-- <input type="hidden" name="variantId"
                                                            value="" /> --}}
                                                            <button value="{{ $item->book_slug }}"
                                                                class="btn-buy firstb btn-cart
                                                                button_35 left-to muangay add_to_cart"
                                                                title="Thêm giỏ hàng">Thêm giỏ hàng
                                                            </button>
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
                    <!-- Sản phẩm nổi bật 4 -->
                </div>
            </div>
        </div>
    </div>
</div>
