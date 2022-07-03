<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Bookstore | @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('admin::layouts.header')

</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

        <!-- Preloader -->

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block admin_dashboard">
                    <a href="javascript:void(0)"
                        class="nav-link">Trang
                        chủ</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block admin_profile">
                    <a href="javascript:void(0)" class="nav-link">Profile</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block admin">
                    <a href="javascript:void(0)" class="nav-link">Quản trị viên</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item admin_logout">
                    <a class="nav-link" href="javascript:void(0)" role="button">

                        <i class="fas fa-sign-out-alt fa-2x" aria-hidden="true"></i>
                    </a>


                </li>

                <!-- Messages Dropdown Menu -->

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="javascript:void(0)" class="brand-link text-center admin_dashboard">
                {{-- <img src="{{ asset('BackEnd/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
                <span class="brand-text font-weight-light">Admin Bookstore</span>
            </a>

            @include('admin::layouts.sidebar')
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">{{ $link }}</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">

                                <li class="breadcrumb-item"><a href="javascript:void(0)" class="admin_dashboard">Trang
                                        chủ</a></li>
                                @yield('breadcrumb_sub')
                                <!-- <li class="breadcrumb-item active">Dashboard v1</li> -->
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    @include('admin::layouts.stat')
                    <!-- /.row -->
                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->

                        <!-- /.Left col -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        @yield('content')
                        <!-- right col -->
                    </div>
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @include('admin::layouts.footer')

    @include('admin::modal.modalprofile')
    @include('admin::ajax.view')
    @stack('scripts')
</body>

</html>

