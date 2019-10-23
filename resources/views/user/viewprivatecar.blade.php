@include('user.includes.header')

    

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