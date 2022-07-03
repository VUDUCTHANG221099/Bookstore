<section class="bread-crumb">
    <span class="crumb-border"></span>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 a-left">
                <ul class="breadcrumb">
                    <li class="home">
                        <a href="javascript:void(0)">
                            <span>Trang chủ</span>
                        </a>
                        <span class="mr_lr">
                            &nbsp;<i class="fa fa-angle-right"></i>
                            &nbsp;
                        </span>
                    </li>
                    {{-- <li>
                        <a href="/tin-tuc"><span>Tin tức</span></a>
                        <span class="mr_lr">&nbsp;<i class="fa fa-angle-right"></i>&nbsp;</span>
                    </li> --}}
                    @yield('breadcrumd_sub')
                    <li>

                            <strong>
                                <span>{{$link}}</span>
                            </strong>
                        
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>