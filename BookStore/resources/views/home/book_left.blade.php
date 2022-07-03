 <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
     <div class="section section_product_sale">
         <div class="section title_module_main">
             <h2 class="h2 book">
                 <a href="javascript:void(0)" title="Đang giảm giá">Đang giảm giá</a>
             </h2>

             <div class="view_all book">
                 <a href="javascript:void(0)" title="Xem tất cả">Xem tất cả
                     <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
             </div>
         </div>
         <div class="product-sale">
             <div class="swiper_product_sale swiper-container">
                 <div class="swiper-wrapper">
                     <!-- Đang giảm giá -->
                     @if (isset($bookSale))
                         @foreach ($bookSale as $item)
                             <div class="swiper-slide">
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
                                                 <input type="hidden" value="1" id="qtym">
                                                <form class="variants form-nut-grid">
                                                    <div class="group_action">
                                                       
                                                        <button type="submit" data-url="{{ route('addToCart', ['id' => $item->id]) }}"
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
                     <!-- Đang giảm giá -->

                     <!-- Đang giảm giá -->
                 </div>
             </div>
         </div>
     </div>
     <script>
         var swiper = new Swiper(".swiper_product_sale", {
             slidesPerView: 1,
             spaceBetween: 0,
             slidesPerGroup: 1,
             breakpoints: {
                 300: {
                     slidesPerView: 1,
                     spaceBetween: 0,
                 },
                 500: {
                     slidesPerView: 1,
                     spaceBetween: 0,
                 },
                 640: {
                     slidesPerView: 1,
                     spaceBetween: 0,
                 },
                 768: {
                     slidesPerView: 1,
                     spaceBetween: 0,
                 },
                 992: {
                     slidesPerView: 1,
                     spaceBetween: 0,
                 },
                 1200: {
                     slidesPerView: 1,
                     spaceBetween: 0,
                 },
             },
         });
     </script>
     <!-- Support -->
     <div class="section section_online_support">
         <div class="title_module_main">
             <h2>Hỗ trợ trực tuyến</h2>
         </div>
         <div class="support-content">
             <div class="support">
                 <span class="hd-support">Tư vấn bán hàng 1</span>
                 <span class="support-name">Mr. Thắng:
                     <span><a href="tel:18006750">18006750</a></span></span>
             </div>
             <div class="support">
                 <span class="hd-support">Tư vấn bán hàng 2</span>
                 <span class="support-name">Mrs. Thu:
                     <span><a href="tel:18006750">18006750</a></span></span>
             </div>
             <div class="support support-email">
                 <span class="hd-support">Email liên hệ</span>
                 <span class="support-name"><a href="mailto:support@sapo.vn">support@thanglong.vn</a></span>
             </div>
         </div>
     </div>
     <!-- Support -->

     <script>
         var swiper = new Swiper(".swiper_feedback", {
             slidesPerView: 1,
             spaceBetween: 0,
             slidesPerGroup: 1,
             breakpoints: {
                 300: {
                     slidesPerView: 1,
                     spaceBetween: 0,
                 },
                 500: {
                     slidesPerView: 1,
                     spaceBetween: 0,
                 },
                 640: {
                     slidesPerView: 1,
                     spaceBetween: 0,
                 },
                 768: {
                     slidesPerView: 1,
                     spaceBetween: 0,
                 },
                 992: {
                     slidesPerView: 1,
                     spaceBetween: 0,
                 },
                 1200: {
                     slidesPerView: 1,
                     spaceBetween: 0,
                 },
             },
         });
     </script>

     <article class="section section_blog">
         <div class="title_module_main post">
             <h2><a href="javascript:void(0)" title="Bài viết">Bài viết</a></h2>
         </div>
         <div class="blog_owlrap">
             <div class="section blog_owlrap">
                 <div class="swiper_blog swiper-container brand_content">
                     <div class="swiper-wrapper">
                         <!-- Bài viết 5 -->

                         @if (isset($listPostFE))
                             @foreach ($listPostFE as $item)
                                 <div class="swiper-slide">
                                     <div class="myblog">
                                         <div class="image-blog-left">
                                             <a href="{{ route('postdetails', ['slug' => $item->slug]) }}"
                                                 class="image-reponsive">
                                                 <img class="lazyload" src="
                                                            {{ isset($item->avatar) ? asset("images/post/$item->avatar") : asset('images/default.jpg') }}
                                                            " title="{{ $item->title }}"
                                                     alt="{{ $item->title }}" />
                                             </a>
                                         </div>
                                         <div class="content_blog">
                                             <h3 class="h3">
                                                 <a href="{{ route('postdetails', ['slug' => $item->slug]) }}"
                                                     title="{{ $item->title }}">{{ $item->title }}</a>
                                             </h3>

                                             <span class="time_post">
                                                 <span class="author-post">
                                                     <i
                                                         class="fa fa-user"></i>&nbsp;{{ $item->full_name }}&nbsp;&nbsp;
                                                 </span>
                                                 <span class="day-post">
                                                     <i
                                                         class="fa fa-calendar"></i>&nbsp;{{ $carbon::parse($item->create_at)->translatedFormat('d/m/Y') }}
                                                 </span>
                                             </span>

                                             <div class="summary_item_blog">
                                                 <p>
                                                     @php
                                                         $description = strip_tags($item->description);
                                                         
                                                     @endphp
                                                     {{ isset($item->description)
                                                         ? ($str::length($description) > 10
                                                             ? $str::words($description, 10, '...')
                                                             : $description)
                                                         : 'Nội dung đang cập nhật' }}...<a
                                                         class="readmore"
                                                         href="{{ route('postdetails', ['slug' => $item->slug]) }}"
                                                         title="Xem thêm">
                                                         [Xem thêm...]
                                                 </p>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             @endforeach
                         @endif

                         <!-- Bài viết 5 -->



                         <!-- Bài viết 5 -->
                     </div>
                 </div>
                 <div id="prev-blog" class="swiper-button-prev"></div>
                 <div id="next-blog" class="swiper-button-next"></div>
                 <div class="view_all post">
                     <a href="javascript:void(0)" title="Xem tất cả">Xem tất cả
                         <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                 </div>
             </div>
         </div>
     </article>
     <script>
         var swiper = new Swiper(".swiper_blog", {
             slidesPerView: 1,
             spaceBetween: 0,
             slidesPerGroup: 1,
             navigation: {
                 nextEl: "#next-blog",
                 prevEl: "#prev-blog",
             },
             breakpoints: {
                 300: {
                     slidesPerView: 1,
                     spaceBetween: 0,
                 },
                 500: {
                     slidesPerView: 1,
                     spaceBetween: 0,
                 },
                 640: {
                     slidesPerView: 1,
                     spaceBetween: 0,
                 },
                 768: {
                     slidesPerView: 1,
                     spaceBetween: 0,
                 },
                 992: {
                     slidesPerView: 1,
                     spaceBetween: 0,
                 },
                 1200: {
                     slidesPerView: 1,
                     spaceBetween: 0,
                 },
             },
         });
     </script>
 </div>
