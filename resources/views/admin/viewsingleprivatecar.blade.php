@include('admin.includes.header')

<aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="#"><img src="{{ asset('images/ferrari1.jfif')}}" class="img-circle" width="80"></a></p>
          <h5 class="centered">Rent and Ride</h5>
          <li class="mt">
            <a href="{{ url('admin/index') }}">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
           <li>
            <a href="{{ url('admin/viewcar') }}">
              <i class="fa fa-map-marker"></i>
              <span>Cars</span>
              </a>
          </li>
          <li>
            <a class="active" href="{{ url('admin/viewprivatecar') }}">
              <i class="fa fa-map-marker"></i>
              <span>Private Cars</span>
              </a>
          </li>
          <li>
            <a href="{{ url('admin/view/users') }}">
              <i class="fa fa-map-marker"></i>
              <span>Users</span>
              </a>
          </li>
           <li>
            <a href="{{ url('admin/booking/detail') }}">
              <i class="fa fa-map-marker"></i>
              <span>Booking Details</span>
              </a>
          </li>
          <li>
            <a href="{{ url('admin/forum') }}">
              <i class="fa fa-map-marker"></i>
              <span>Feedbacks</span>
              </a>
          </li>
          <li>
            <a href="{{ url('admin/notification') }}">
              <i class="fa fa-map-marker"></i>
              <span>Notifications</span>
              </a>
          </li>

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>

<!--main content start-->
    <section id="main-content">
      <section class="wrapper" >
        <h3><i class="fa fa-angle-right"></i>Car Details</h3>


        <!-- row -->
        <div class="row mt">

          <div class="col-md-12">
            <div class="content-panel">
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
              
                   

                    
                    <img style = "height:200px; width:auto;' >" src = "{{ URL::to('/').'/uploads/'.$car['image'] }}"> <br>
                    <p >By: {{ $car->user['email'] }},
                    {{ $car['created_at']->diffForHumans() }}</p>
                   

                    
                     <h4>Name: {{ $car['car_name'] }}</h4>
                     <h4>Model: {{ $car['car_model'] }}</h4>
                     <h4>price: {{ $car['price'] }}</h4>
                     <h4>Capacity: {{ $car['capacity'] }}</h4>
                     <h4>Fuel Type: {{ $car['fuel_type'] }}</h4>
                     <h4>AC: {{ $car['aircondition'] }}</h4>
                     <h4>Description: </h4>
                     <p style="margin-left: 10px">{{ $car['car_description'] }}</p>


                     
                      <img style = "height:200px; width:auto; >" src = "{{ URL::to('/').'/uploads/'.$car['billbook'] }}"> <br>BillBook<br>
                    

                     <img style = "height:200px; width:auto; >" src = "{{ URL::to('/').'/uploads/'.$car['citizenship'] }}"> <br>Citizenship <br>
                   


                     <br>

                     @if($car['remarks'] == 'pending')
                     
                     <form action = "{{ url('admin/confirm/privatecar') }}" method = 'POST'>

                      <input type = 'hidden' name = 'id' value = "{{ $car['id'] }}" />
                      <input type = 'hidden' name = 'userid' value = "{{ $car->user['id'] }}" />
                      <input type = 'hidden' name = '_token' value = '{{ csrf_token() }}' />
                      <input type = 'hidden' name = '_method' value = 'PUT' />
                     <button  class="btn btn-primary">Approve</button>
                      </form>
                      or<br>


                     <form action = "{{ url('admin/delete/privatecar') }}" method = 'POST'>

                      <input type = 'hidden' name = 'id' value = "{{ $car['id'] }}" />
                      <input type = 'hidden' name = 'userid' value = "{{ $car->user['id'] }}" />
                      <input type = 'hidden' name = '_token' value = '{{ csrf_token() }}' />
                      <input type = 'hidden' name = '_method' value = 'DELETE' />
                     <button  class="btn btn-danger">Delete</button>
                      </form>

                      @else
                      
                     <button  class="btn btn-warning" disabled="">Approved</button>
                     
                      <br>or<br>


                     <form action = "{{ url('admin/delete/privatecar') }}" method = 'POST'>

                      <input type = 'hidden' name = 'id' value = "{{ $car['id'] }}" />
                      <input type = 'hidden' name = 'userid' value = "{{ $car->user['id'] }}" />
                      <input type = 'hidden' name = '_token' value = '{{ csrf_token() }}' />
                      <input type = 'hidden' name = '_method' value = 'DELETE' />
                     <button  class="btn btn-danger">Delete</button>
                      </form>
                      @endif




                     
                
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
        <!-- /row -->
      </section>
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->

@include('admin.includes.footer')
