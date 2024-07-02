<div class="navbar-header">
    <!-- This is for the sidebar toggle which is visible on mobile only -->
    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
        <i class="ti-menu ti-close"></i>
    </a>
    <!-- ============================================================== -->
    <!-- Logo -->
    <!-- ============================================================== -->
    <div class="navbar-brand">
        <a href="{{route('super-admin.dashboard')}}" class="logo">
            <!-- Logo icon -->
            <b class="logo-icon">
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                <!-- Dark Logo icon -->
                <img src="{{asset('admins/'.$template)}}/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                <!-- Light Logo icon -->
                <img src="{{asset('admins/'.$template)}}/assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
            </b>
            <!--End Logo icon -->
            <!-- Logo text -->
            <span class="logo-text">
                <!-- dark Logo text -->
                <img src="{{asset('admins/'.$template)}}/assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                <!-- Light Logo text -->
                <img src="{{asset('admins/'.$template)}}/assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
            </span>
        </a>
        <a class="sidebartoggler d-none d-md-block" href="javascript:void(0)" data-sidebartype="mini-sidebar">
            <i class="mdi mdi-toggle-switch mdi-toggle-switch-off font-20"></i>
        </a>
    </div>
    <!-- ============================================================== -->
    <!-- End Logo -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Toggle which is visible on mobile only -->
    <!-- ============================================================== -->
    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="ti-more"></i>
    </a>
</div>