<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if gt IE 9]> <html lang="en" class="ie"> <![endif]-->
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

  @yield('style')

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
<div class="wrapper">
  <!-- Header Styles -->
  <div class="header-nav">

    <div class="main-header-nav scrollingto-fixed irs-menu-style-one">
      <div class="container">
        <nav class="navbar navbar-default bootsnav irs-menu-style-one yellow">
          <div class="container irs-pad-zero">
            <!-- Start Header Navigation -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"> <i class="fa fa-bars"></i> </button>
              <a class="navbar-brand" href="#"><img src="{{ asset('images/header-logo.png') }}" class="logo" alt="header-logo.png"></a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
              <ul class="nav navbar-nav navbar-left">
                <li class="dropdown"> <a href="#" class="dropdown-toggle active" data-toggle="dropdown">Home</a>
                  <ul class="dropdown-menu">
                    <li><a href="index.html">Homepage V1</a></li>
                    <li><a href="index-layout-two.html">Homepage V2</a></li>
                  </ul>
                </li>
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Courses</a>
                  <ul class="dropdown-menu">
                    <li><a href="page-courses-grid.html">Courses Grid</a></li>
                    <li><a href="page-courses-list.html">Courses List</a></li>
                    <li><a href="page-courses-details.html">Courses Details</a></li>
                  </ul>
                </li>
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Features</a>
                  <ul class="dropdown-menu">
                    <li><a href="page-become-teacher.html">Become A Teacher</a></li>
                    <li><a href="page-teacher-details.html">Teacher Details</a></li>
                  </ul>
                </li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                @if (Route::has('login'))
                    @auth
                      <li><a href="{{ url('/home') }}">Home</a></li>
                @else
                      <li><a href="{{ route('login') }}">Login</a></li>
                      <li><a href="{{ route('register') }}">Register</a></li>
                    @endauth
                @endif
              </ul>
            </div>
            <!-- /.navbar-collapse -->
          </div>
        </nav>
      </div>
    </div>
  </div>


  @yield('content')

  <!-- Footer Section -->
  <section class="irs-footer">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 irs-padl-zero irs-pl-fftn">
          <div class="irs-footer-social-icon">
            <ul class="list-inline">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-youtube"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-lg-offset-1">
          <div class="irs-footer-contact-info">
            <h2><span class="irs-fci-icon flaticon-phone-receiver"></span> (012) 345 - 6789</h2>
            <h5>Any Questions? Call Us. </h5>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
          <div class="irs-footer-location-info">
            <h2><span class="irs-fci-icon flaticon-facebook-placeholder-for-locate-places-on-maps"></span> (012) 345 - 6789</h2>
            <h5>Any Questions? Call Us. </h5>
          </div>
        </div>
      </div>
      <div class="row irs-mrgnt-two">
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 irs-padl-zero irs-pl-fftn">
          <div class="irs-footer-useful-link">
            <h4 class="irs-mrgnbot-fourty">Useful Links</h4>
            <ul class="irs-list-square">
              <li><a href="#">Become a Teacher</a></li>
              <li><a href="#">Careers</a></li>
              <li><a href="#">FAQ</a></li>
              <li><a href="#">Our Blog</a></li>
              <li><a href="#">Our Events</a></li>
              <li><a href="#">Contact Us</a></li>
            </ul>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 irs-padl-zero irs-pl-fftn">
          <div class="irs-footer-latest-course">
            <h4 class="irs-mrgnbot-fourty irs-pl-fftn">Latest Courses Added</h4>
            <div class="media irs-fln-media-one irs-mrgnbot-fourty">
              <div class="media-left pull-left"> <a href="#"> <img class="media-object" src="images/courses/s1.png" alt="s1.png"> </a> </div>
              <div class="media-body">
                <h4 class="media-heading irs-flc-ttl"><a href="#">Classical Archaeology and Ancient History</a></h4>
                <div class="irs-flnws-price">$35.99</div>
              </div>
            </div>
            <div class="media irs-fln-media-two irs-mrgnbot-fourty">
              <div class="media-left pull-left"> <a href="#"> <img class="media-object" src="images/courses/s2.png" alt="s2.png"> </a> </div>
              <div class="media-body">
                <h4 class="media-heading irs-flc-ttl"><a href="#">Philosophy, Politics and Economics (PPE)</a></h4>
                <div class="irs-flnws-price">Free</div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 irs-padl-zero irs-pl-fftn">
          <div class="row">
            <div class="irs-footer-gallery">
              <h4 class="irs-mrgnbot-fourty">Latest Courses Added</h4>
              <div class="col-sm-3 irs-padl-zero irs-pl-fftn">
                <div class="irs-footer-gallery-thumb"> <img class="img-responsive img-fluid" src="images/gallery/fg1.png" alt="fg1.png">
                  <div class="irs-fg-overlay"></div>
                </div>
              </div>
              <div class="col-sm-3 irs-padl-zero irs-pl-fftn">
                <div class="irs-footer-gallery-thumb"> <img class="img-responsive img-fluid" src="images/gallery/fg2.png" alt="fg2.png">
                  <div class="irs-fg-overlay"></div>
                </div>
              </div>
              <div class="col-sm-3 irs-padl-zero irs-pl-fftn">
                <div class="irs-footer-gallery-thumb"> <img class="img-responsive img-fluid" src="images/gallery/fg3.png" alt="fg3.png">
                  <div class="irs-fg-overlay"></div>
                </div>
              </div>
              <div class="col-sm-3 irs-padl-zero irs-pl-fftn">
                <div class="irs-footer-gallery-thumb"> <img class="img-responsive img-fluid" src="images/gallery/fg4.png" alt="fg4.png">
                  <div class="irs-fg-overlay"></div>
                </div>
              </div>
              <div class="col-sm-3 irs-padl-zero irs-pl-fftn">
                <div class="irs-footer-gallery-thumb"> <img class="img-responsive img-fluid" src="images/gallery/fg5.png" alt="fg5.png">
                  <div class="irs-fg-overlay"></div>
                </div>
              </div>
              <div class="col-sm-3 irs-padl-zero irs-pl-fftn">
                <div class="irs-footer-gallery-thumb"> <img class="img-responsive img-fluid" src="images/gallery/fg6.png" alt="fg6.png">
                  <div class="irs-fg-overlay"></div>
                </div>
              </div>
              <div class="col-sm-3 irs-padl-zero irs-pl-fftn">
                <div class="irs-footer-gallery-thumb"> <img class="img-responsive img-fluid" src="images/gallery/fg7.png" alt="fg7.png">
                  <div class="irs-fg-overlay"></div>
                </div>
              </div>
              <div class="col-sm-3 irs-padl-zero irs-pl-fftn">
                <div class="irs-footer-gallery-thumb"> <img class="img-responsive img-fluid" src="images/gallery/fg8.png" alt="fg8.png">
                  <div class="irs-fg-overlay"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Our CopyRight Section -->
  <section class="irs-copy-right">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p>Irstheme Copyright© 2017 All Rights Received. Designed with <i class="fa fa-heart"></i> <span class="text-thm2">diadea3007</span></p>
        </div>
      </div>
    </div>
  </section>
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a> </div>
<!-- Wrapper End -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootsnav.js"></script>
<script type="text/javascript" src="js/scrollto.js"></script>
<script type="text/javascript" src="js/jquery-scrolltofixed-min.js"></script>
<script type="text/javascript" src="js/jquery-SmoothScroll-min.js"></script>
<script type="text/javascript" src="js/jquery.counterup.js"></script>
<script type="text/javascript" src="js/fancybox.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script type="text/javascript" src="js/jquery.masonry.min.js"></script>
<script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/jquery.fitvids.js"></script>
<script type="text/javascript" src="js/css3-animate-it.js"></script>
<script type="text/javascript" src="js/swiper.min.js"></script>
<script type="text/javascript" src="js/flipclock.min.js"></script>
<!-- Custom script for all pages -->
<script type="text/javascript" src="js/script.js"></script>

<!-- Initialize Swiper -->
  @yield('script')
</body>
</html>