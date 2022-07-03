<div class="hidden-lg opacity_menu"></div>
<!-- Main content -->
<!-- Đăng nhập, đăng ký, thanh toán -->
<div class="htop section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="accoutlink">

                    <a class="btns loginView checkLogin" href="javascript:void()"><i class="fa fa-lock"></i> Đăng
                        nhập</a>
                    <a href="javascript:void()" class="checkLogin RegisterView"><i class="fa fa-sign-in-alt"></i> Đăng
                        ký</a>

                    <a class="btns tai_khoan checkLogout" href="javascript:void()"><i class="fa fa-user"></i> Tài
                        khoản</a>
                    <a href="javascript:void()" class="checkLogout logout"><i class="fa fa-sign-out-alt"></i> Đăng
                        xuất</a>



                    {{-- {{dd($link)}} --}}
                    {{-- {{dd($token_book)}} --}}
                    {{-- {{dd($token)}} --}}

                    {{-- <a href="javascript:void(0)" class="checkoutCart"><i class="fa fa-check-square"></i>Thanh toán</a> --}}

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Đăng nhập, đăng ký, thanh toán -->
<header class="header">
    <div class="mid-header wid_100">
        <div class="container">
            <div class="row">
                <div class="content_header">
                    <div class="header-main">
                        <div class="menu-bar nav-mobile-button hidden-lg hidden-md">
                            <a href="#nav-mobile" aria-label="menubar">
                                <i class="fa fa-bars"></i>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 logo-main">
                            <div class="logo">
                                <a href="/" class="logo-wrapper">
                                    <img width="10" height="10" src="{{ asset('FrontEnd/assets/images/logo.png') }}"
                                        alt="logo Bookstore" />
                                </a>
                            </div>
                        </div>
                        <!-- Giao hàng Free, Đổi trả Free, Hỗ trợ 24/7 -->
                        <div class="col-lg-5 col-md-5 col-sm-6 hidden-sm hidden-xs service-col">
                            <div class="row"  style="display: none">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="service-header">
                                        <i class="fas fa-cube"></i>Giao hàng free
                                    </div>
                                </div>
                                {{-- <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="service-header">
                                        <i class="fas fa-exchange-alt"></i>Đổi trả free
                                    </div>
                                </div> --}}
                                <div class="col-lg-4 col-md-4 col-sm-4"  style="display: none">
                                    <div class="service-header">
                                        <i class="fas fa-life-ring"></i>Hỗ trợ 24/7
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Giao hàng Free, Đổi trả Free, Hỗ trợ 24/7 -->
                        <!-- Giỏ hàng -->

                        <div class="col-lg-3 col-md-3 col-xs-12 cartright Gio_Hang_Right">
                            @include('layouts.Gio_Hang')
                        </div>
                        <!-- Giỏ hàng -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="header-menu">
    <div class="container">
        <div class="row">
            <!-- Menu -->
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="bg-header-nav hidden-xs hidden-sm">
                    <div>
                        <div class="row row-noGutter-2">
                            <nav class="header-nav">
                                <ul class="item_big">
                                    <li class="nav-item home">
                                        <a class="a-img" href="javascript:void(0)"><span>Trang chủ</span></a>
                                    </li>

                                    <li class="nav-item introduce">
                                        <a class="a-img" href="javascript:void(0)"><span>Giới thiệu</span></a>
                                    </li>

                                    <li class="nav-item book">
                                        <a class="a-img" href="javascript:void(0)"><span>Thể loại</span><i
                                                class="fa fa-angle-down"></i></a>
                                        <ul class="item_small hidden-sm hidden-xs category">
                                            <!-- Thể loại -->



                                            <!-- Thể loại -->
                                        </ul>
                                    </li>

                                    <li class="nav-item post">
                                        <a class="a-img" href="javascript:void(0)"><span>Bài viết</span></a>
                                    </li>

                                    <li class="nav-item contact">
                                        <a class="a-img" href="javascript:void(0)"><span>Liên hệ</span></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Menu -->
            <!-- Tìm kiếm -->
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="header_search">
                    <form action="{{ route('search') }}" method="get" class="input-group search-bar" role="search">
                        {{-- <input type="hidden" name="type" value="product" /> --}}
                        <input type="text" name="keyword" value="{{ Request()->get('keyword') }}" autocomplete="off"
                            placeholder="Tìm kiếm" class="input-group-field auto-search" required="" />
                        <span class="input-group-btn">
                            <button type="submit" class="btn icon-fallback-text" aria-label="search">
                                <span class="fa fa-search"></span>
                            </button>
                        </span>
                    </form>
                </div>
            </div>
            <!-- Tìm kiếm -->
        </div>
    </div>
</div>

<!-- Menu mobile -->
<div class="menu_mobile hidden-lg hidden-md" id="nav-mobile">
    <ul class="ul_collections">
        <li class="level0 level-top parent home">
            <a href="javascript:void(0)">Trang chủ</a>
        </li>

        <li class="level0 level-top parent introduce">
            <a href="javascript:void(0)">Giới thiệu</a>
        </li>

        <li
            class="level0 level-top parent
        {{ Request::route()->getName() == 'book' ? 'active' : false }}
        ">
            <a href="{{ route('book') }}">Thể loại</a>
            <!-- Thể loại -->
            <ul class="level0 category_mobile">

                <!-- Thể loại -->



                <!-- Thể loại -->
            </ul>
        </li>

        <li class="level0 level-top parent post">
            <a href="javascript:void(0)">Bài viết </a>
        </li>

        <li class="level0 level-top parent contact">
            <a href="javascript:void(0)">Liên hệ</a>
        </li>
    </ul>
</div>
<!-- Menu mobile -->

