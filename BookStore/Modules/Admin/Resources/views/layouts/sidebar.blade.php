<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('images/logo.png') }}" class="img-circle elevation-2" alt="User Image" />
        </div>
        <div class="info">
            <a href="javascript:void(0)" class="d-block admin_fullName admin_profile"></a>
        </div>
    </div>

    <!-- SidebarSearch Form -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link 
          
          admin_dashboard">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link
          admin_users">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Khách hàng</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link 
          
          admin_categories">
                    <i class="nav-icon fas fa-solid fa-list"></i>
                    <p>Thể loại</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link 
         




          admin_author">
                    <i class="nav-icon fas fa-user"></i>
                    <p>Tác giả</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link 
        



          admin_book">
                    <i class="nav-icon fas fa-book"></i>
                    <p>Sách</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)"
                    class="nav-link 
                     {{ Request::route()->getName() == 'admin_order' ? 'active' : false }}
          
                          admin_order">
                    <i class="nav-icon fa fa-shopping-cart" aria-hidden="true"></i>

                    <p>Đơn hàng</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)"
                    class="nav-link 
          
                admin_pay">
                    <i class="nav-icon fas fa-credit-card"></i>
                    <p>Thanh toán online</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link 
        

          
          admin_posts">
                    <i class="nav-icon fa fa-sticky-note" aria-hidden="true"></i>

                    <p>Bài viết</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link 
          
          admin_ads">
                    <i class="nav-icon fas fa-ad"></i>
                    <p>Quảng cáo</p>
                </a>
            </li>
           
            <li class="nav-item">
                <a href="javascript:void(0)"
                    class="nav-link 
          
          admin_shipper">
                    <i class="nav-icon fas fa-shipping-fast"></i>
                    <p>Đơn vị vận chuyển</p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
