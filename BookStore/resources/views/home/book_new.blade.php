<div class="section section_product_new">
    <div class="title_module_main">
        <h2><a href="{{ asset('sach?view=grid&sort=created-desc') }}" title="Sản phẩm mới">Sản phẩm mới</a>
        </h2>

        <div class="view_all">
            <a href="{{ asset('sach?view=grid&sort=created-desc') }}" title="Xem tất cả">Xem tất cả
                <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
        </div>
    </div>
    <div class="product-new">
        <!-- Sản phẩm mới 4 -->
        @if (isset($bookSale))
            @foreach ($bookSale as $item)
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 col-product">
                    <div class="item_product_main" >
                        <div class="product-box product-item-main product-item-compare">
                            <div class="product-thumbnail">
                                <a class="image_thumb p_img"
                                    href="{{ route('bookDetailsFE', ['book_slug' => $item->book_slug]) }}"
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
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        <!-- Sản phẩm mới 4 -->


        <!-- Sản phẩm mới 4 -->
    </div>
</div>
