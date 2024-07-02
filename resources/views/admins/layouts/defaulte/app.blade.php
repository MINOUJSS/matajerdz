<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--dinamique meta-->
    @yield('meta')
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admins/'.$template)}}/assets/images/favicon.png">
    <title>@yield('title')</title>
    <!-- Custom CSS -->
    @yield('page_css')
    {{-- <link href="{{asset('admins/'.$template)}}/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="{{asset('admins/'.$template)}}/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="{{asset('admins/'.$template)}}/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" /> --}}
    <!-- Custom CSS -->
    <link href="{{asset('admins/'.$template)}}/dist/css/style.min.css" rel="stylesheet">
    <link href="{{asset('admins/'.$template)}}/assets/css/my_style.css" rel="stylesheet">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
        @yield('header_js')
@livewireStyles
</head>

<body>
    {{-- @yield('preloader') --}}
    @include('admins.layouts.defaulte.starte_elements.in_all_pages.preloader')
    {{-- @include('admins.layouts.defaulte.elements.header_contents.preloader') --}}
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        @yield('topbar_header')
        {{-- @include('admins.layouts.defaulte.elements.header_contents.topbar_header') --}}
        {{-- @include('admins.layouts.defaulte.starte_elements.in_all_pages.topbar_header.main') --}}
        @yield('left_sidebar')
        {{-- @include('admins.layouts.defaulte.elements.header_contents.left_sidebar')
        @include('admins.layouts.defaulte.starte_elements.in_all_pages.left_sidebar') --}}
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            @yield('bread_crumb_and_right_sidebar_toggle')
            {{-- @include('admins.layouts.defaulte.starte_elements.in_all_pages.bread_crumb') --}}
           

           {{-- @include('admins.layouts.'.$template.'.inc.header') --}}
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                @yield('content')
           {{-- @yield('sales_chart')
                @yield('email_compain_chart')
                @yield('revenue')
                @yield('recent_commet_and_chats') --}}
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            {{-- @yield('footer') --}}
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                جميع الحقوق محفوظة لموقع متاجر الجزائر @ {{date('Y')}}
                {{-- All Rights Reserved by Nice admin. Designed and Developed by
                <a href="https://wrappixel.com">WrapPixel</a>. --}}
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    {{-- @yield('customizer_panel') --}}
    @include('admins.layouts.defaulte.elements.footer_contents.customizer_panel')
    <div class="chat-windows"></div>
    {{-- @yield('jsfiles') --}}
    {{-- @include('admins.layouts.defaulte.elements.footer_contents.jsfiles') --}}
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{asset('admins/'.$template)}}/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('admins/'.$template)}}/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="{{asset('admins/'.$template)}}/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="{{asset('admins/'.$template)}}/dist/js/app.min.js"></script>
    <script src="{{asset('admins/'.$template)}}/dist/js/app.init.js"></script>
    <script src="{{asset('admins/'.$template)}}/dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('admins/'.$template)}}/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="{{asset('admins/'.$template)}}/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="{{asset('admins/'.$template)}}/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="{{asset('admins/'.$template)}}/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('admins/'.$template)}}/dist/js/custom.js"></script>
    <!--This page JavaScript -->
    @yield('page_js')
    <!--chartis chart-->
    {{-- <script src="{{asset('admins/'.$template)}}/assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="{{asset('admins/'.$template)}}/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script> --}}
    <!--c3 charts -->
    {{-- <script src="{{asset('admins/'.$template)}}/assets/extra-libs/c3/d3.min.js"></script>
    <script src="{{asset('admins/'.$template)}}/assets/extra-libs/c3/c3.min.js"></script>
    <script src="{{asset('admins/'.$template)}}/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="{{asset('admins/'.$template)}}/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{{asset('admins/'.$template)}}/dist/js/pages/dashboards/dashboard1.js"></script> --}}
    @livewireScripts
</body>

</html>