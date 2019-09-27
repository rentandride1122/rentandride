<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <title>Rent and Ride</title>

    <!--=== Bootstrap CSS ===-->
    <link href="{{ asset('user/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!--=== Slicknav CSS ===-->
    <link href="{{ asset('user/assets/css/plugins/slicknav.min.css') }}" rel="stylesheet">
    <!--=== Magnific Popup CSS ===-->
    <link href="{{ asset('user/assets/css/plugins/magnific-popup.css') }}" rel="stylesheet">
    <!--=== Owl Carousel CSS ===-->
    <link href="{{ asset('user/assets/css/plugins/owl.carousel.min.css') }}" rel="stylesheet">
    <!--=== Gijgo CSS ===-->
    <link href="{{ asset('user/assets/css/plugins/gijgo.css') }}" rel="stylesheet">
    <!--=== FontAwesome CSS ===-->
    <link href="{{ asset('user/assets/css/font-awesome.css') }}" rel="stylesheet">
    <!--=== Theme Reset CSS ===-->
    <link href="{{ asset('user/assets/css/reset.css') }}" rel="stylesheet">
    <!--=== Main Style CSS ===-->
    <link href="{{ asset('user/style.css') }}" rel="stylesheet">
    <!--=== Responsive CSS ===-->
    <link href="{{ asset('user/assets/css/responsive.css') }}" rel="stylesheet">


    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>


<body class="loader-active">


    <!--== Preloader Area Start ==-->
    <!-- <div class="preloader">
        <div class="preloader-spinner">
            <div class="loader-content">
                <img src="{{ asset('assets/user/assets/img/preloader.gif') }}" alt="JSOFT">
            </div>
        </div>
    </div> -->
    <!--== Preloader Area End ==-->

    <!--== Header Area Start ==-->
    <header id="header-area" class="fixed-top">
        <!--== Header Top Start ==-->
        <div id="header-top" class="d-none d-xl-block">
            <div class="container">
                <div class="row ">
                    <!--== Single HeaderTop Start ==-->
                    <div class="col-lg-3 text-left">
                        <i class="fa fa-map-marker"></i> pipalboat, Dillibazar, Kathmandu
                    </div>
                    <!--== Single HeaderTop End ==-->

                    <!--== Single HeaderTop Start ==-->
                    <div class="col-lg-3 text-center">
                        <i class="fa fa-mobile"></i> 014 234 567
                    </div>
                    <!--== Single HeaderTop End ==-->

                    <!--== Single HeaderTop Start ==-->
                    <div class="col-lg-3 text-center">
                        <i class="fa fa-clock-o"></i> Mon-Fri 09.00 - 17.00
                    </div>
                    <!--== Single HeaderTop End ==-->

                    <!--== Social Icons Start ==-->
                    <div class="col-lg-3 text-right">
                        <div class="header-social-icons">
                        @if(Auth::check())
                            <a href="{{ url('user/update') }}" style="color: yellow">{{ Auth::user()->name }}</a> 
                        @else
                            <a href="{{ url('user/login') }}">Login</a>
                        @endif

                        <a href="">|</a>

                        @if(Auth::check())

                           <a href="{{ url('user/logout') }}">Logout</a>
                        @else
                            <a href="{{ url('user/register') }}">Register</a>
                        @endif
                            

                        </div>
                    </div>
                    <!--== Social Icons End ==-->
                </div>
            </div>
        </div>
        <!--== Header Top End ==-->

        <!--== Header Bottom Start ==-->
        <div id="header-bottom">
            <div class="container">
                <div class="row">
                    <!--== Logo Start ==-->
                    <div class="col-lg-4">
                        <a href="{{ url('user/index') }}" class="logo">
                            <!-- <img src="assets/img/logo.png" alt="JSOFT"> -->
                            <h2 style="color: white">Rent and Ride</h2>
                        </a>
                    </div>
                    <!--== Logo End ==-->

                    <!--== Main Menu Start ==-->
                    <div class="col-lg-8 d-none d-xl-block">
                        <nav class="mainmenu alignright">
                            <ul>
                                <li><a href="{{ url('user/index') }}">Home</a></li>
                                
                                <li><a href="{{ url('user/car') }}">Cars</a></li>
                                <li><a href="{{ url('user/private/car') }}">Private Cars</a></li>
                                <li><a href="#">Services</a>
                                    <ul>
                                        <li><a href="{{ url('user/createcar') }}">Rent your car</a></li>
                                        <li><a href="driver.html">Sell or Buy car</a></li>
                                      
                                    </ul>
                                </li>
                                <li><a href="{{ url('user/forum') }}">Forum</a></li>
                                <li><a href="{{ url('user/about') }}">About Us</a></li>
                                <li><a href="{{ url('user/contact') }}">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!--== Main Menu End ==-->
                </div>
            </div>
        </div>
        <!--== Header Bottom End ==-->
    </header>
    <!--== Header Area End ==-->
