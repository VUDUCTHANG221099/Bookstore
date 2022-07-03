<div class="block-quickview primary_block row">

    <div class="product-left-column col-xs-12 col-sm-5 col-md-5 col-lg-5">
        <div class="clearfix image-block">
            <span class="view_full_size">
                <a class="img-product" href="{{ route('bookDetailsFE', ['book_slug' => $book->book_slug]) }}">
                    <img id="product-featured-image-quickview"
                        class="img-responsive img-responsiveBook 
                                    product-featured-image-quickview"
                        src="{{ isset($book->avatar) ? asset('images/book/' . $book->avatar) : asset('images/default.jpg') }}">
                </a>
            </span>
            <div class="loading-imgquickview" style="display:none;"></div>
        </div>

    </div>
    <div class="product-center-column product-info product-item col-xs-5 
                col-sm-7 col-md-7 col-lg-7">
        <div class="head-qv">
            <h3 class="qwp-name"><a href="{{ route('bookDetailsFE', ['book_slug' => $book->book_slug]) }}"
                    class="text2line">{{ $book->book_name }}</a>
            </h3>
            <div class="vend-qv">
                <div class="left_vend">
                    <span>Tình trạng: <span class="soluong">
                            {{ $book->status == 1 ? 'Còn hàng' : 'Hết hàng' }}
                        </span></span>
                    <span class="type"></span>
                    <span class="line">|</span>
                    <span>Thể loại: </span><span class="vendor_">{{ $book->category_name }}</span>
                </div>

            </div>
        </div>

        <div class="quickview-info">
            <span class="prices">
                <span class="price sale-price">{{number_format($book->price-3000)}}₫</span>
                <del class="old-price">{{number_format($book->price)}}₫</del>
            </span>
        </div>
        <div class="product-description">
            <div class="rte" style="display: none;">

            </div>
        </div>

        <div class="quick_option variants form-ajaxtocart" id="product-actions-1272393">
            <span class="price-product-detail hidden" style="opacity: 0;">
                <span class=""></span>
            </span>


            <div class="quantity_wanted_p" data-url="{{ route('addToCart', ['id' => $book->id]) }}">
                <span class="soluong_h">Số lượng</span>
                <div class="input_qty_qv">
                    <a class="btn_num num_1 button button_qty"
                        onclick="var result = document.getElementById('quantity-detail'); var qtyqv = result.value; if( !isNaN( qtyqv ) &amp;&amp; qtyqv > 1 ) result.value--;return false;">-</a>
                    <input type="text" id="quantity-detail" maxlength="3" name="quantity" value="1"
                        class="form-control prd_quantity"
                        onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;"
                        onchange="if(this.value == 0)this.value=1;">
                    <a class="btn_num num_2 button button_qty"
                        onclick="var result = document.getElementById('quantity-detail'); var qtyqv = result.value; if( !isNaN( qtyqv )) result.value++;return false;">+</a>
                </div>


                <div class="button_actions clearfix">
                    <button type="submit"
                        class="btn btn_base fix_add_to_cart ajax_addtocart btn_add_cart btn-cart add_to_cart add_to_cart_detail">
                        <span class="text_1">Thêm vào giỏ</span>
                    </button>

                </div>
            </div>


            {{-- <input type="hidden" name="id" value="1272393">
            <input type="hidden" name="variantId" value="1954479"> --}}
        </div>


    </div>

</div>
