<!DOCTYPE html>
<!--[if IE 9]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if gt IE 9]>
<html lang="en" class="ie"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Title -->
  <title>Edu Hub</title>

  <!-- Favicon -->
  <link href="{{ asset('images/apple-icon.png') }}" rel="icon" type="image/png">
  <link href="{{ asset('images/favicon.png') }}" rel="shortcut icon" type="image/png">

  <!-- css file -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <!-- Responsive stylesheet -->
  <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

  <style>
    .header-nav {
      position: static;
    }

    .pagination-links {
      text-align: center;
      margin-top: 100px;
    }
  </style>

@yield('style')

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="{{ asset('js/html5shiv.min.js') }}"></script>
  <script src="{{ asset('js/respond.min.js') }}"></script>
  <![endif]-->
</head>
<body>
<div class="wrapper">
  @include('includes.header-nav')

  @yield('content')

  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a></div>
<!-- Wrapper End -->
<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootsnav.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/scrollto.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-scrolltofixed-min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-SmoothScroll-min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.counterup.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/fancybox.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/wow.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.masonry.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.fitvids.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/css3-animate-it.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/swiper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/flipclock.min.js') }}"></script>
<!-- Custom script for all pages -->
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>

<style>
  .avatar-img {
    max-height: 50px;
    max-width: 50px;
    border-radius: 50%;
  }
</style>

<!-- Initialize Swiper -->
@yield('script')
</body>
</html>