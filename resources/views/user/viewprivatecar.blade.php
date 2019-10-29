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

    

    <!--== Car List Area Start ==-->
    <section id="car-list-area" class="section-padding" style="margin-top: 70px">
        <div class="container">
            <div class="row">
                <!-- Car List Content Start -->
                <div class="col-lg-8">
                    <div class="car-list-content">
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

                         @foreach($cars as $c)
                        <!-- Single Car Start -->
                        <div class="single-car-wrap">
                            <div class="row">
                                <!-- Single Car Thumbnail -->
                                <div class="col-lg-5">
                                    <a href="{{ url('user/privatecar/fulldescription/'.$c['id']) }}"><img style="height: 220px; margin:5px" src = "{{ URL::to('/').'/uploads/'.$c['image'] }}"></a>
                                </div>
                                <!-- Single Car Thumbnail -->

                              
                                <!-- Single Car Info -->
                                <div class="col-lg-7">
                                    <div class="display-table">
                                        <div class="display-table-cell">
                                            <div class="car-list-info">
                                                <h5>Name: {{ $c['car_name'] }}</h5>
                                                <h5> Model: {{ $c['car_model'] }}</h5>
                                                
                                              <!--   <p>Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi. Aenean inorci luctus et ultrices posuere cubilia.</p> -->
                                                <ul>
                                                    <li><h7>Air Condition: {{ $c['aircondition'] }}</h7></li>
                                                    <li><h7>Fuel Type: {{ $c['fuel_type'] }}</h7></li>
                                                    <li><h7>Seats: {{ $c['capacity'] }}</h7></li>
                                                </ul>

                                                <h5 class="rating" style="color:    ;margin-top: -15px">
                                                    Rs. {{ $c['price'] }}/ per day
                                                </h5>
                                                <a href="{{ url('client/bookprivatecar/'.$c['id']) }}" class="rent-btn">Book It</a>
                                                <h6 style="float: right;margin-top: 25px">{{ $c['created_at']->diffForHumans() }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Car info -->

                                 
                            </div>
                        </div>
                        <!-- Single Car End -->

                        @endforeach

                    </div>

                    <!-- Page Pagination Start -->


                     
                    <div class="page-pagi">
                        <nav aria-label="Page navigation example">
                            {{ $cars->links() }}
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

                @include('user.includes.sidebar')

                
            </div>
        </div>
    </section>
    <!--== Car List Area End ==-->
@include('user.includes.footer')