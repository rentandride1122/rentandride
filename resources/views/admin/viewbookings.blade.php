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
            <a href="{{ url('admin/viewprivatecar') }}">
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
            <a class="active" href="{{ url('admin/booking/detail') }}">
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
      <section class="wrapper" style="height: 1000px">
        <h3><i class="fa fa-angle-right"></i>Booking Details</h3>

        Total: {{ $bookings_count->count()}}

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
              <table class="table table-striped table-advance table-hover">
               
                
                <thead>
                  <tr>
                    
                    <th>Name</th>
                    <th>Model</th>
                    <th>Price (Rs)</th>
                    <th>Image</th>
                    <th>Car Owner</th>
                    <th>Booked By</th>
                    <th>Start Date</th>
                    <th>Return Date</th>
                    <th>Time</th>
                    
                
                  </tr>
                </thead>
                <tbody>

                  @foreach($bookings as $b)

                  @if($b['privatecar_id'] == null)
                  <tr>
                    
                    <td>{{ $b->car['car_name'] }}</td>
                    <td>{{ $b->car['car_model'] }}</td>
                    
                    <td>{{ $b->car['price'] }}</td>
                    <td><img style = "height:120px; width:auto;' >" src = "{{ URL::to('/').'/uploads/'.$b->car['image'] }}"> </td>
                    <td>{{ 'Company' }}</td>
                   <td>{{ $b->user['email'] }}</td>
                   <td>{{ $b['booking_from'] }}</td>
                   <td>{{ $b['booking_to'] }}</td>
                   <td>{{ $b['created_at']->diffForHumans() }}</td>
                  

                    <td>
                      <!-- <a href="{{ url('admin/confirm/booking/'.$b['id']) }}">Approve</a> -->

                      @if($b['remarks'] == 'pending')
                       <form action = "{{ url('admin/confirm/booking') }}" method = 'POST'>

                      <input type = 'hidden' name = 'id' value = "{{ $b['id'] }}" />
                      <input type = 'hidden' name = '_token' value = '{{ csrf_token() }}' />
                      <input type = 'hidden' name = '_method' value = 'PUT' />
                     <button  class="btn btn-success">Approve</button>
                      </form>
                      @elseif($b['remarks'] == 'approved')
                      <button class="btn btn-info" disabled="">Approved</button>
                      @else
                      
                      @endif

                    </td>

                    <td>
                      @if($b['remarks'] == 'pending' || $b['remarks'] == 'approved')
                       <form action = "{{ url('admin/complete/booking') }}" method = 'POST'>

                      <input type = 'hidden' name = 'id' value = "{{ $b['id'] }}" />
                      <input type = 'hidden' name = '_token' value = '{{ csrf_token() }}' />
                      <input type = 'hidden' name = '_method' value = 'PUT' />
                     <button  class="btn btn-success">Done</button>
                      </form>
                     
                      @else
                      
                      @endif
                    </td>

                    <td>
                      @if($b['remarks'] == 'canceled')

                      <button class="btn btn-warning" disabled="">Canceled</button>

                      @elseif($b['remarks'] == 'done')
                       <button class="btn btn-warning" disabled="">Done</button>

                      @else
                      <form action = "{{ url('admin/cancel/booking') }}" method = 'POST'>

                      <input type = 'hidden' name = 'id' value = "{{ $b['id'] }}" />
                      <input type = 'hidden' name = '_token' value = '{{ csrf_token() }}' />
                      <input type = 'hidden' name = '_method' value = 'PUT' />
                     <button  class="btn btn-danger">Cancel</button>
                      </form>
                      @endif

                    </td>

                  </tr>

                   @elseif($b['car_id'] == null)
                  <tr>
                    
                    <td>{{ $b->privatecar['car_name'] }}</td>
                    <td>{{ $b->privatecar['car_model'] }}</td>
                    
                    <td>{{ $b->privatecar['price'] }}</td>
                    <td><img style = "height:120px; width:auto;' >" src = "{{ URL::to('/').'/uploads/'.$b->privatecar['image'] }}"> </td>
                    <td>{{ $b->privatecar->user['email'] }}</td>
                   <td>{{ $b->user['email'] }}</td>
                   <td>{{ $b['booking_from'] }}</td>
                   <td>{{ $b['booking_to'] }}</td>
                   <td>{{ $b['created_at']->diffForHumans() }}</td>
                  

                    <td>
                      <!-- <a href="{{ url('admin/confirm/booking/'.$b['id']) }}">Approve</a> -->

                      @if($b['remarks'] == 'pending')
                       <form action = "{{ url('admin/confirm/booking') }}" method = 'POST'>

                      <input type = 'hidden' name = 'id' value = "{{ $b['id'] }}" />
                      <input type = 'hidden' name = '_token' value = '{{ csrf_token() }}' />
                      <input type = 'hidden' name = '_method' value = 'PUT' />
                     <button  class="btn btn-success">Approve</button>
                      </form>
                      @elseif($b['remarks'] == 'approved')
                      <button class="btn btn-info" disabled="">Approved</button>
                      @else
                      
                      @endif

                    </td>

                    <td>
                      @if($b['remarks'] == 'pending' || $b['remarks'] == 'approved')
                       <form action = "{{ url('admin/complete/booking') }}" method = 'POST'>

                      <input type = 'hidden' name = 'id' value = "{{ $b['id'] }}" />
                      <input type = 'hidden' name = '_token' value = '{{ csrf_token() }}' />
                      <input type = 'hidden' name = '_method' value = 'PUT' />
                     <button  class="btn btn-success">Done</button>
                      </form>
                     
                      @else
                      
                      @endif
                    </td>

                    <td>
                      @if($b['remarks'] == 'canceled')

                      <button class="btn btn-warning" disabled="">Canceled</button>

                      @elseif($b['remarks'] == 'done')
                       <button class="btn btn-warning" disabled="">Done</button>

                      @else
                      <form action = "{{ url('admin/cancel/booking') }}" method = 'POST'>

                      <input type = 'hidden' name = 'id' value = "{{ $b['id'] }}" />
                      <input type = 'hidden' name = '_token' value = '{{ csrf_token() }}' />
                      <input type = 'hidden' name = '_method' value = 'PUT' />
                     <button  class="btn btn-danger">Cancel</button>
                      </form>
                      @endif

                    </td>

                  </tr>

                  @endif
                  @endforeach
               
                </tbody>
              </table>
               {{ $bookings->links() }}

              


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
