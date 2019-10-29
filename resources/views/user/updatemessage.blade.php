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


   <link type="text/css" rel="stylesheet" href="{{ asset('user/assets/js/jquery-ui.min.css') }}">
   <script src="{{ asset('user/assets/js/jquery-3.2.1.min.js') }}"></script>
  
 
</head>


<body class="loader-active">


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

                     @if(Auth::check() == false)
                        <div class="col-lg-3 ">
                        </div>
                     @else
                    <!--== Single HeaderTop Start ==-->
                    <div class="col-lg-3 ">
                        
                        <nav class="mainmenu alignright" style="margin-top: -12px;margin-bottom: -15px">
                            <ul>
                                <li><a href="#"><i class="fa fa-bell"></i>
                                    <span class="badge badge-light">{{ auth()->user()->unReadNotifications->count() }}</span>
                                </a>
                                    <ul>
                                        <li style="background: #007bff"><a href="{{ url('user/notification/markAsRead') }}">Mark all as read</a></li>

                                         @foreach(auth()->user()->unreadNotifications as $notification)
                                        <li style="background: #4ECDC4">
                                            <a href="#">{{ $notification->data['data'] }}
                                                <br>
                                                <p style="font-size: 10px">{{ $notification['created_at']->diffForHumans() }}</p>
                                            </a>
                                        </li>
                                        @endforeach

                                        @foreach(auth()->user()->readNotifications as $notification)
                                        <li>
                                            <a href="#">{{ $notification->data['data'] }}
                                                 <p style="font-size: 10px">{{ $notification['created_at']->diffForHumans() }}</p>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                
                            </ul>
                        </nav>
                    
                    </div>
                    <!--== Single HeaderTop End ==-->
                    @endif

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
                                
                                <li><a href="{{ url('user/viewcars') }}">Cars</a></li>
                                <li><a href="{{ url('user/viewprivatecars') }}">Private Cars</a></li>
                                <li><a href="#">Services</a>
                                    <ul>
                                        <li><a href="{{ url('user/yourcar') }}">Your Cars</a></li>
                                        
                                      
                                    </ul>
                                </li>
                                <li class="active"><a href="{{ url('user/forum') }}">Forum</a></li>
                                <li><a href="{{ url('user/booking/detail') }}">My Booking</a></li>
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



<!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Forum</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>You can provide feedback to us</p>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== Car List Area Start ==-->
    <section id="car-list-area" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Car List Content Start -->
                <div class="col-lg-8">
                	 @if(\Session::has('msg'))
          <div class = 'alert alert-success'>
            <p>{{ \Session::get('msg') }}</p>
          </div></br>
          @endif
          @if($errors->any())
          <div class = 'alert alert-danger'>
            <ul>
              @foreach($errors->all() as $e)
              <li>{{ $e }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <h3>Comments</h3>
          <hr>

        
                    <br>
                    <form method="POST" action="{{ url('user/updatemessage') }}">
                    	<textarea name="comment" style="width: 600px;height: 200px;border: 2px solid #a9c6c9;">{{ $forum['comment'] }}</textarea>
                    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                          <input type = 'hidden' name = '_method' value = "PUT" />
                                          <input type = 'hidden' name = 'id' value = "{{ $forum['id'] }}"/>
                    	<input type="submit" class="btn btn-primary" value="Update">
                    </form>


                    <!-- Page Pagination Start -->
                    <div class="page-pagi">
                        <nav aria-label="Page navigation example">
                            
                            <!-- <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul> -->
                        </nav>
                    </div>
                    <!-- Page Pagination End -->
                </div>

                <!-- Car List Content End -->

                <!-- Sidebar Area Start -->
                <div class="col-lg-4">
                    <div class="sidebar-content-wrap m-t-50">
                        <!-- Single Sidebar Start -->
                        <div class="single-sidebar">
                            <h3>For More Informations</h3>

                            <div class="sidebar-body">
                                <p><i class="fa fa-mobile"></i> +8801816 277 243</p>
                                <p><i class="fa fa-clock-o"></i> Mon - Sat 8.00 - 18.00</p>
                            </div>
                        </div>
                        <!-- Single Sidebar End -->

                        <!-- Single Sidebar Start -->
                        <div class="single-sidebar">
                            <h3>Rental Tips</h3>

                            <div class="sidebar-body">
                                <ul class="recent-tips">
                                    <li class="single-recent-tips">
                                        <div class="recent-tip-thum">
                                            <a href="#"><img src="assets/img/we-do/service1-img.png" alt="JSOFT"></a>
                                        </div>
                                        <div class="recent-tip-body">
                                            <h4><a href="#">How to Enjoy Losses Angeles Car Rentals</a></h4>
                                            <span class="date">February 5, 2018</span>
                                        </div>
                                    </li>

                                    <li class="single-recent-tips">
                                        <div class="recent-tip-thum">
                                            <a href="#"><img src="assets/img/we-do/service3-img.png" alt="JSOFT"></a>
                                        </div>
                                        <div class="recent-tip-body">
                                            <h4><a href="#">How to Enjoy Losses Angeles Car Rentals</a></h4>
                                            <span class="date">February 5, 2018</span>
                                        </div>
                                    </li>

                                    <li class="single-recent-tips">
                                        <div class="recent-tip-thum">
                                            <a href="#"><img src="assets/img/we-do/service2-img.png" alt="JSOFT"></a>
                                        </div>
                                        <div class="recent-tip-body">
                                            <h4><a href="#">How to Enjoy Losses Angeles Car Rentals</a></h4>
                                            <span class="date">February 5, 2018</span>
                                        </div>
                                    </li>

                                    <li class="single-recent-tips">
                                        <div class="recent-tip-thum">
                                            <a href="#"><img src="assets/img/we-do/service3-img.png" alt="JSOFT"></a>
                                        </div>
                                        <div class="recent-tip-body">
                                            <h4><a href="#">How to Enjoy Losses Angeles Car Rentals</a></h4>
                                            <span class="date">February 5, 2018</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Single Sidebar End -->

                        <!-- Single Sidebar Start -->
                        <div class="single-sidebar">
                            <h3>Connect with Us</h3>

                            <div class="sidebar-body">
                                <div class="social-icons text-center">
                                    <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                                    <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                                    <a href="#" target="_blank"><i class="fa fa-behance"></i></a>
                                    <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                                    <a href="#" target="_blank"><i class="fa fa-dribbble"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Sidebar End -->
                    </div>
                </div>
                <!-- Sidebar Area End -->
            </div>
        </div>
    </section>
    <!--== Car List Area End ==-->



 @include('user.includes.footer')