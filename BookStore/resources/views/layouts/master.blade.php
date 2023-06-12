<!DOCTYPE html>
<html lang="vi">

<head>
    <!-- ================= Favicon ================== -->
    {{-- <base href="{{ asset('FrontEnd/') }}/"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('FrontEnd/assets/images/logo.png')}}" type="image/x-icon" />

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>@yield('title') </title>

    <!--Header-->
    @include('layouts.header')
    <!--Header-->
</head>

<body>
    <div class="page-body">
        <!--Menu-->
        @include('layouts.navigation')
        <!--Menu-->

        <div id="menu-overlay" class=""></div>
        <!-- Header JS -->
        <h1 class="hidden">
            SkyBook - Chào mừng quý khách đến với SkyBook - website mua sách trực
            tuyến hàng đầu Việt Nam. Ở SkyBook, quý khách sẽ có những trải nghiệm
            mua sắm thú vị!
        </h1>
        <!-- Content -->


        @yield('content')

        <!-- Content -->

        <!--Footer-->
        @include('layouts.Xem_Nhanh')
        @include('layouts.Them_Gio_Hang')
        
        
       


        @include('layouts.address')
        @include('layouts.footer')

        <!--Footer-->
    </div>

    @include('ajax.view')
    @include('ajax.cart')
    @include('ajax.ajax')

   
    @stack('scripts')


</body>

</html>
