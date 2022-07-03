<div class="section_slider section">
    <div class="container">
        <div class="row">
            <!-- Banner left -->
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="home-slider swiper-container">
                    <div class="swiper-wrapper">
                        @if (isset($adsCenter))
                            @foreach ($adsCenter as $item)
                                <div class="item swiper-slide">
                                    <a href="{{ isset($item->avatar) ? asset("images/ads/$item->avatar") : asset('images/default.jpg') }}"
                                        class="clearfix">
                                        <picture>
                                            <source media="(max-width: 480px)"
                                                srcset="{{ isset($item->avatar) ? asset("images/ads/$item->avatar") : asset('images/default.jpg') }}" />
                                            <source media="(min-width: 481px) and (max-width: 600px)"
                                                srcset="{{ isset($item->avatar) ? asset("images/ads/$item->avatar") : asset('images/default.jpg') }}" />
                                            <source media="(min-width: 601px) and (max-width: 1023px)"
                                                srcset="{{ isset($item->avatar) ? asset("images/ads/$item->avatar") : asset('images/default.jpg') }}" />
                                            <source media="(min-width: 1024px) and (max-width: 1199px)"
                                                srcset="{{ isset($item->avatar) ? asset("images/ads/$item->avatar") : asset('images/default.jpg') }}" />
                                            <source media="(min-width: 1200px)"
                                                srcset="{{ isset($item->avatar) ? asset("images/ads/$item->avatar") : asset('images/default.jpg') }}" />
                                            <img width="10px" height="10px"
                                                src="{{ isset($item->avatar) ? asset("images/ads/$item->avatar") : asset('images/default.jpg') }}"
                                                alt="{{ $item->title }}" />
                                        </picture>
                                    </a>
                                </div>
                            @endforeach
                        @endif


                    </div>
                    <div id="prev-slider" class="swiper-button-prev"></div>
                    <div id="next-slider" class="swiper-button-next"></div>
                </div>
            </div>
            <!-- Banner left -->
            <!-- Banner right -->
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 hidden-xs hidden-sm">
                <a class="slider-banner"
                    href="{{ isset($adsRight->avatar) ? asset("images/ads/$adsRight->avatar") : asset('images/default.jpg') }}"
                    title="{{ $adsRight->title }}">
                    <img class="img-responsive lazyload" width="10" height="10"
                        src="{{ isset($adsRight->avatar) ? asset("images/ads/$adsRight->avatar") : asset('images/default.jpg') }}"
                        alt="{{ $adsRight->title }}" />
                </a>
            </div>
            <!-- Banner right -->
        </div>
    </div>
</div>

<script>
    var swiper = new Swiper(".home-slider", {
        navigation: {
            nextEl: "#next-slider",
            prevEl: "#prev-slider",
        },
    });
</script>