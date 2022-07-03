<!-- Header -->
<!-- Plugin CSS -->
<link rel="preload" as="style" type="text/css" href="{{asset('FrontEnd/assets/css/base.scss.css')}}" />
<link rel="preload" as="style" type="text/css" href="{{asset('FrontEnd/assets/css/style.scss.css')}}" />
<link rel="preload" as="style" type="text/css" href="{{asset('FrontEnd/assets/css/module.scss.css')}}" />
<link rel="preload" as="style" type="text/css" href="{{asset('FrontEnd/assets/css/responsive.scss.css')}}" />
<link rel="preload" as="style" type="text/css" href="{{asset('FrontEnd/assets/css/plugin.scss.css')}}" />
<link rel="preload" as="style" type="text/css" href="{{asset('FrontEnd/assets/css/swiper.min.css')}}" />
<link rel="preload" as="style" type="text/css" href="{{asset('FrontEnd/assets/css/header.scss.css')}}" />

<link href="{{asset('FrontEnd/assets/css/swiper.min.css')}}" rel="stylesheet" type="text/css" />

<!-- Plugin CSS -->
<link href="{{asset('FrontEnd/assets/css/plugin.scss.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('FrontEnd/assets/css/header.scss.css')}}" rel="stylesheet" type="text/css" />
<!-- Build Main CSS -->
<link href="{{asset('FrontEnd/assets/css/base.scss.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('FrontEnd/assets/css/style.scss.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('FrontEnd/assets/css/module.scss.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('FrontEnd/assets/css/responsive.scss.css')}}" rel="stylesheet" type="text/css" />
{{-- <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"> --}}


<link rel="preload" as="script" href="{{asset('FrontEnd/assets/js/jquery.min.js')}}" />
<script src="{{asset('FrontEnd/assets/js/jquery.min.js')}}" type="text/javascript"></script>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  --}}
<!-- Bizweb javascript customer -->
<script>
    $(document).ready(function($) {
        awe_lazyloadImage();
    });

    function awe_lazyloadImage() {
        var ll = new LazyLoad({
            elements_selector: ".lazyload",
            load_delay: 100,
            threshold: 0,
        });
    }
    window.awe_lazyloadImage = awe_lazyloadImage;
</script>

<link rel="preload" as="script" href="{{asset('FrontEnd/assets/js/swiper.min.js')}}" />
<script src="{{asset('FrontEnd/assets/js/swiper.min.js')}}" type="text/javascript"></script>
<!-- Header -->
<!--DataTable-->
{{-- Capcha --}}
{{-- <script src="https://www.google.com/recaptcha/api.js"></script> --}}


{{-- Capcha --}}

@yield('header_CSS')