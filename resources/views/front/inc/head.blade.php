<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CSS -->
	<link rel="stylesheet" href="{{asset('front/css/bootstrap-reboot.min.css')}}">
	<link rel="stylesheet" href="{{asset('front/css/bootstrap-grid.min.css')}}">
	<link rel="stylesheet" href="{{asset('front/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('front/css/jquery.mCustomScrollbar.min.css')}}">
	<link rel="stylesheet" href="{{asset('front/css/nouislider.min.css')}}">
	<link rel="stylesheet" href="{{asset('front/css/ionicons.min.css')}}">
	<link rel="stylesheet" href="{{asset('front/css/magnific-popup.css')}}">
	<link rel="stylesheet" href="{{asset('front/css/plyr.css')}}">
	<link rel="stylesheet" href="{{asset('front/css/photoswipe.css')}}">
	<link rel="stylesheet" href="{{asset('front/css/default-skin.css')}}">
	<link rel="stylesheet" href="{{asset('front/css/main.css')}}">

	<!-- Favicons -->
	<link rel="icon" type="image/png" href="{{asset('front/icon/favicon-32x32.png')}}" sizes="32x32">
	<link rel="apple-touch-icon" href="{{asset('front/icon/favicon-32x32.png')}}">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Dmitry Volkov">
	<title>{{$title ?? 'Online movies CMS App In Laravel'}} | {{env('APP_NAME') ?? 'Movies CMS'}}</title>

    @stack('head')
    @stack('styles')
</head>
