@include('user.includes.header')
<!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Your Cars</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->


     <!--== Choose Car Area Start ==-->
    <section id="choose-car" class="section-padding">

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
           <a href="{{ url('user/createcar') }}" class="btn btn-primary">Add your car</a>
           <p><br></p>

            <div class="row">
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

                                    	@foreach($cars as $c)
                                        <!-- Single Popular Car Start -->
                                        <div class="col-lg-4 col-md-6 con suv mpv">
                                            <div class="single-popular-car">
                                                <div class="p-car-thumbnails">
                                                    <a class="car-hover" href="{{ URL::to('/').'/uploads/'.$c['image'] }}">
                                                      <img style="height: 220px" src="{{ URL::to('/').'/uploads/'.$c['image'] }}" alt="JSOFT">
                                                   </a>
                                                </div>

                                                <div class="p-car-content">
                                                    <h3>
                                                        <a href="#">{{ $c['car_name'] }}</a>
                                                        <span class="price"><i class="fa fa-tag"></i> {{ $c['remarks'] }}</span>
                                                    </h3>
                                                    <h5> Rs. {{ $c['price'] }}</h5>
                                                    <h5> Capacity: {{ $c['capacity'] }}</h5>
                                                    <h5> Fuel Type: {{ $c['fuel_type'] }}</h5>
                                                    <h5> AC: {{ $c['aircondition'] }}</h5>



                                                    <h5 align="right">{{ $c['created_at'] }}</h5>
                                                    <a href="" >View</a>

                                                </div>

                                            </div>
                                        </div>
                                        <!-- Single Popular Car End -->

                                         @endforeach
                                        
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