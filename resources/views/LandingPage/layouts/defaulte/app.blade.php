<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Arsha Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('landingpage/defaulte')}}/img/favicon.png" rel="icon">
  {{-- <link rel="icon" href="{{asset('landingpage/defaulte')}}/img/favicon.png"> --}}
  {{-- <link href="{{asset('landingpage/defaulte')}}/img/apple-touch-icon.png" rel="apple-touch-icon"> --}}

  <!-- Google Fonts -->
  {{-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> --}}

  <!-- Vendor CSS Files -->
  <link href="{{asset('landingpage/defaulte')}}/css/aos.css" rel="stylesheet">
  <link href="{{asset('landingpage/defaulte')}}/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{asset('landingpage/defaulte')}}/css/bootstrap-rtl.min.css" rel="stylesheet">
  <link href="{{asset('landingpage/defaulte')}}/css/bootstrap-icons.css" rel="stylesheet">
  <link href="{{asset('landingpage/defaulte')}}/css/boxicons.css" rel="stylesheet">
  <link href="{{asset('landingpage/defaulte')}}/css/glightbox.min.css" rel="stylesheet">
  <link href="{{asset('landingpage/defaulte')}}/css/remixicon.css" rel="stylesheet">
  <link href="{{asset('landingpage/defaulte')}}/css/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('landingpage/defaulte')}}/css/style.css" rel="stylesheet">
  <link href="{{asset('landingpage/defaulte')}}/css/theme_one.css" rel="stylesheet">
  <!--My Editing-->
  <link href="{{asset('landingpage/defaulte')}}/css/mystyle.css" rel="stylesheet">
  {{-- My Fonts --}}
  <link rel="stylesheet" href="{{asset('landingpage/defaulte')}}/css/kufi_font.css">

  <!-- =======================================================
  * Template Name: Arsha
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  @yield('header')

  @yield('hero')

  <main id="main">

    @yield('cliens')

    @yield('about')

    @yield('why-us')

    @yield('skills')

    @yield('services')
  
    @yield('cta')

    @yield('portfolio')
    
    @yield('team')

    @yield('pricing')

    @yield('faq')

    @yield('contact')

  </main><!-- End #main -->

  @yield('footer')
  
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @yield('jsfiles')  

</body>

</html>