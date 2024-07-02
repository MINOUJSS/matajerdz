<!DOCTYPE html>
<html lang="ar" class="no-js" dir="rtl">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="{{asset('stores/'.$template)}}/img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Karma Shop</title>
	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" href="{{asset('stores/'.$template)}}/css/linearicons.css">
	<link rel="stylesheet" href="{{asset('stores/'.$template)}}/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('stores/'.$template)}}/css/themify-icons.css">
	<link rel="stylesheet" href="{{asset('stores/'.$template)}}/css/bootstrap.css">
	{{-- <link rel="stylesheet" href="{{asset('store/'.$template)}}/css/bootstrap.min.css"> --}}
	<link rel="stylesheet" href="{{asset('store/'.$template)}}/css/bootstrap-rtl.min.css">
	<link rel="stylesheet" href="{{asset('stores/'.$template)}}/css/owl.carousel.css">
	<link rel="stylesheet" href="{{asset('stores/'.$template)}}/css/nice-select.css">
	<link rel="stylesheet" href="{{asset('stores/'.$template)}}/css/nouislider.min.css">
	<link rel="stylesheet" href="{{asset('stores/'.$template)}}/css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="{{asset('stores/'.$template)}}/css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="{{asset('stores/'.$template)}}/css/magnific-popup.css">
	<link rel="stylesheet" href="{{asset('stores/'.$template)}}/css/main.css">
	<link rel="stylesheet" href="{{asset('stores/'.$template)}}/css/style.css">
</head>

<body>

	@yield('header')

	@yield('banner')

	@yield('blog-categorie')

	@yield('blog')
	@yield('cart')

	@yield('features')

	@yield('category')

    @yield('product')
	
    @yield('exclusive-deal')

    @yield('brand')
	
    @yield('related-product')
	
    @yield('footer')
	
    @yield('jsfiles')
</body>

</html>