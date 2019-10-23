@include('user.includes.header')



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



                                                    <h5 align="right">{{ $car['created_at'] }}</h5>

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