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
          <!--  <a href="{{ url('user/createcar') }}" class="btn btn-primary">Add new car</a> -->
           <p><br></p>

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
                                  
                                  <h1>Your Booked car</h1>
                                    <!-- PopularCars Tab Content Start -->
                                    <div class="row popular-car-gird">

                                        @foreach($booking as $b)


                                        @if($b['privatecar_id'] == null)
                                        <!-- Single Popular Car Start -->
                                        <div class="col-lg-4 col-md-6 con suv mpv" >
                                            <div class="single-popular-car">
                                                <div class="p-car-thumbnails">
                                                    <a class="car-hover" href="{{ URL::to('/').'/uploads/'.$b->car['image'] }}">
                                                      <img style="height: 300px" src="{{ URL::to('/').'/uploads/'.$b->car['image'] }}" alt="JSOFT">
                                                   </a>
                                                </div>
                                                <h5 align="right" style="color:red">{{ $b['remarks'] }}</h5>
                                                 <h5 align="right">{{ $b['created_at'] }}</h5>

                                                <div class="p-car-content">
                                                    <h3>
                                                        <a href="#">Car name: {{ $b->car['car_name'] }}</a>
                                                        
                                                    </h3>
                                                    <h5> Model: {{ $b->car['car_model'] }}</h5>
                                                    <h5> Price: Rs. {{ $b->car['price'] }}</h5>
                                                    <h5> Capacity: {{ $b->car['capacity'] }}</h5>
                                                    <h5> Fuel Type: {{ $b->car['fuel_type'] }}</h5>
                                                    <h5> AC: {{ $b->car['aircondition'] }}</h5>
                                                    
                                                    ----------------------------

                                                    <h5>Start Date: {{ $b['booking_from'] }}</h5>
                                                    <h5>Return Date: {{ $b['booking_to'] }}</h5>

                                                    ----------------------------
                                                    <br>


                                                    @if($b['remarks'] == 'pending')
                                                    <a href="{{ url('user/update/booking/'.$b['id']) }}" class="btn btn-success">Change date</a><br>
                                                    or
                                                    <br>

                                                    <form action = "{{ url('user/cancel/booking') }}" method = 'POST'>

                                                      <input type = 'hidden' name = 'id' value = "{{ $b['id'] }}" />
                                                      <input type = 'hidden' name = '_token' value = '{{ csrf_token() }}' />
                                                      <input type = 'hidden' name = '_method' value = 'PUT' />
                                                     <button  class="btn btn-danger">Cancel Booking</button>
                                                      </form>


                                                    @elseif($b['remarks'] == 'approved')

                                                    <form action = "{{ url('user/cancel/booking') }}" method = 'POST'>

                                                      <input type = 'hidden' name = 'id' value = "{{ $b['id'] }}" />
                                                      <input type = 'hidden' name = '_token' value = '{{ csrf_token() }}' />
                                                      <input type = 'hidden' name = '_method' value = 'PUT' />
                                                     <button  class="btn btn-danger">Cancel Booking</button>
                                                      </form>

                                                    @else


                                                    @endif

                                                    
                                                   
                                                    

                                                </div>

                                            </div>
                                        </div>
                                        <!-- Single Popular Car End -->

                                        @elseif($b['car_id'] == null)

                                        <!-- Single Popular Car Start -->
                                        <div class="col-lg-4 col-md-6 con suv mpv" >
                                            <div class="single-popular-car">
                                                <div class="p-car-thumbnails">
                                                    <a class="car-hover" href="{{ URL::to('/').'/uploads/'.$b->privatecar['image'] }}">
                                                      <img style="height: 300px" src="{{ URL::to('/').'/uploads/'.$b->privatecar['image'] }}" alt="JSOFT">
                                                   </a>
                                                </div>
                                                <h5 align="right" style="color:red">{{ $b['remarks'] }}</h5>
                                                 <h5 align="right">{{ $b['created_at'] }}</h5>

                                                <div class="p-car-content">
                                                    <h3>
                                                        <a href="#">Car name: {{ $b->privatecar['car_name'] }}</a>
                                                        
                                                    </h3>
                                                    <h5> Model: {{ $b->privatecar['car_model'] }}</h5>
                                                    <h5> Price: Rs. {{ $b->privatecar['price'] }}</h5>
                                                    <h5> Capacity: {{ $b->privatecar['capacity'] }}</h5>
                                                    <h5> Fuel Type: {{ $b->privatecar['fuel_type'] }}</h5>
                                                    <h5> AC: {{ $b->privatecar['aircondition'] }}</h5>
                                                    
                                                    ----------------------------

                                                    <h5>Start Date: {{ $b['booking_from'] }}</h5>
                                                    <h5>Return Date: {{ $b['booking_to'] }}</h5>

                                                    ----------------------------
                                                    <br>


                                                    @if($b['remarks'] == 'pending')
                                                    <a href="{{ url('user/update/booking/'.$b['id']) }}" class="btn btn-success">Change date</a><br>
                                                    or
                                                    <br>

                                                    <form action = "{{ url('user/cancel/booking') }}" method = 'POST'>

                                                      <input type = 'hidden' name = 'id' value = "{{ $b['id'] }}" />
                                                      <input type = 'hidden' name = '_token' value = '{{ csrf_token() }}' />
                                                      <input type = 'hidden' name = '_method' value = 'PUT' />
                                                     <button  class="btn btn-danger">Cancel Booking</button>
                                                      </form>
                                                      
                                                    @elseif($b['remarks'] == 'approved')

                                                   <form action = "{{ url('user/cancel/booking') }}" method = 'POST'>

                                                      <input type = 'hidden' name = 'id' value = "{{ $b['id'] }}" />
                                                      <input type = 'hidden' name = '_token' value = '{{ csrf_token() }}' />
                                                      <input type = 'hidden' name = '_method' value = 'PUT' />
                                                     <button  class="btn btn-danger">Cancel Booking</button>
                                                      </form>
                                                    @else


                                                    @endif

                                                    
                                                   
                                                    

                                                </div>

                                            </div>
                                        </div>
                                        <!-- Single Popular Car End -->

                                        @endif

                                      @endforeach   
                                        
                                    </div>
                                    <!-- PopularCars Tab Content End -->
                                </div>
                                <!-- Popular Cars Content Wrapper End -->
                            </div>
                            <!-- Popular Cars Tab End -->

                        </div>
                        <!-- Choose Area Tab content -->

                        {{ $booking->links() }}
                    </div>
                </div>
                <!-- Choose Area Content End -->
            </div>
        </div>
    </section>
    <!--== Choose Car Area End ==-->



@include('user.includes.footer')