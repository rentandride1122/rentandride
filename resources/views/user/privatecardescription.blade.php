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
                                <li class="active"><a href="{{ url('user/viewprivatecars') }}">Private Cars</a></li>
                                <li><a href="#">Services</a>
                                    <ul>
                                        <li><a href="{{ url('user/yourcar') }}">Your Cars</a></li>
                                        
                                      
                                    </ul>
                                </li>
                                <li><a href="{{ url('user/forum') }}">Forum</a></li>
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




    <!--== Choose Car Area Start ==-->
    <section id="choose-car" class="section-padding" style="margin-top: 70px">

        <div class="container">
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
          

            <div class="row" >
                <!-- Choose Area Content Start -->
                <div class="col-lg-12">
                    <div class="choose-content-wrap">
                        

                        <!-- Choose Area Tab content -->
                        <div class="tab-content" id="myTabContent">
                            <!-- Popular Cars Tab Start -->
                            <div class="tab-pane fade show active" id="popular_cars" role="tabpanel" aria-labelledby="home-tab">
                                <!-- Popular Cars Content Wrapper Start -->
                                <div class="popular-cars-wrap">
                                  

                                    <!-- PopularCars Tab Content Start -->
                                    <div class="row popular-car-gird">

                                        
                                        <!-- Single Popular Car Start -->
                                        <div class="col-lg-4 col-md-6 con suv mpv" >
                                            <div class="single-popular-car">
                                                <div class="p-car-thumbnails">
                                                    <a class="car-hover" href="{{ URL::to('/').'/uploads/'.$car['image'] }}">
                                                      <img style="height: 300px" src="{{ URL::to('/').'/uploads/'.$car['image'] }}" alt="JSOFT">
                                                   </a>
                                                </div>

                                                <div class="p-car-content">
                                                    <h3>
                                                        <a href="#">{{ $car['car_name'] }}</a>
                                                        <span class="price"><i class="fa fa-tag"></i>Price: Rs. {{ $car['price'] }}</span>
                                                    </h3>
                                                    <h5> Model: {{ $car['car_model'] }}</h5>
                                                 
                                                    <h5> Capacity: {{ $car['capacity'] }}</h5>
                                                    <h5> Fuel Type: {{ $car['fuel_type'] }}</h5>
                                                    <h5> AC: {{ $car['aircondition'] }}</h5>
                                                    <h5>Description: {{ $car['car_description'] }}</h5>



                                                    <h5 align="right">{{ $car['created_at']->diffForHumans() }}</h5>

                                                    <a href="{{ url('client/bookcar/'.$car['id']) }}" class="rent-btn">Book It</a>
                                                   
                                                    

                                                </div>

                                            </div>
                                        </div>
                                        <!-- Single Popular Car End -->

                                         
                                        
                                    </div>
                                    <!-- PopularCars Tab Content End -->
                                </div>
                                <!-- Popular Cars Content Wrapper End -->
                            </div>
                            <!-- Popular Cars Tab End -->

                        </div>
                        <!-- Choose Area Tab content -->
                    </div>
                </div>
                <!-- Choose Area Content End -->
            </div>
        </div>
    </section>
    <!--== Choose Car Area End ==-->



@include('user.includes.footer')