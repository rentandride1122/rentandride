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
                                <li class="active"><a href="#">Services</a>
                                    <ul>
                                        <li class="active"><a href="{{ url('user/yourcar') }}">Your Cars</a></li>
                                        
                                      
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




    <!--== Contact Page Area Start ==-->
    <div class="contact-page-wrao section-padding" style="margin-top: 70px">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
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
          	<h3>Edit your car</h3><br>
                    
                    	<form action="{{ url('user/edit/yourcar') }}" method="POST" enctype="multipart/form-data">
						  <div class="form-group">
						    <label class="control-label col-sm-2">Car Name:</label>
						    <div class="col-sm-10">
						      <input type="text" name="car_name" class="form-control" value="{{ $car['car_name'] }}" required="">
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="control-label col-sm-2" >Car Model:</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name="car_model" value="{{ $car['car_model'] }}" required="">
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="control-label col-sm-2">Price:</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name="price" value="{{ $car['price'] }}" required="">
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="control-label col-sm-2">Capacity (seats):</label>
						    <div class="col-sm-10">
						      <input type="number" class="form-control" name="capacity" value="{{ $car['capacity'] }}" required="">
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="control-label col-sm-2">Fuel Type:</label>
						    <div class="col-sm-10">
						      <select name="fuel_type" class="form-control">
						      	<option @if(old('fuel_type',$car['fuel_type']) == 'petrol') selected="" @endif value="petrol">petrol</option>
						      	<option @if(old('fuel_type',$car['fuel_type']) == 'diseal') selected="" @endif value="diseal">diseal</option>
						      </select>
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="control-label col-sm-2">Air Condition:</label>
						    <div class="col-sm-10">
						       <div class="form-control">
			                      <input type="radio" name="aircondition" value="yes" @if(old('aircondition',$car['aircondition']) == 'yes') checked="" @endif>Yes
                     <input type="radio" name="aircondition" value="no" @if(old('aircondition',$car['aircondition']) == 'no') checked="" @endif>No
                     			</div>
						    </div>
						  </div>
						  
			                   
			                  <div class="form-group ">
			                    <label for="ccomment" class="control-label col-lg-2">Description</label>
			                    <div class="col-lg-10">
			                      <textarea class="form-control " name="car_description" required>{{ $car['car_description'] }}</textarea>
			                    </div>
			                  </div>

			                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
			                  <input type="hidden" name="_method" value="PUT">
			                   <input type="hidden" name="id" value="{{ $car['id'] }}">
                  			 

						<div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						      <input type="submit" class="btn btn-primary" value="Change">
						    </div>
						</div>
						</form>

                </div>
            </div>
        </div>
    </div>
    <!--== Contact Page Area End ==-->




@include('user.includes.footer')