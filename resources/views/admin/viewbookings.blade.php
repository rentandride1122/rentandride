@include('admin.includes.header')

@include('admin.includes.sidebar')

<!--main content start-->
    <section id="main-content">
      <section class="wrapper" style="height: 1000px">
        <h3><i class="fa fa-angle-right"></i>Booking Details</h3>

        Total: {{ $bookings->count()}}

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
                    <th>Booked By</th>
                    <th>Start Date</th>
                    <th>Return Date</th>
                    
                
                  </tr>
                </thead>
                <tbody>

                  @foreach($bookings as $b)
                  <tr>
                    
                    <td>{{ $b->car['car_name'] }}</td>
                    <td>{{ $b->car['car_model'] }}</td>
                    
                    <td>{{ $b->car['price'] }}</td>
                    <td><img style = "height:120px; width:auto;' >" src = "{{ URL::to('/').'/uploads/'.$b->car['image'] }}"> </td>
                   <td>{{ $b->user['email'] }}</td>
                   <td>{{ $b['booking_from'] }}</td>
                   <td>{{ $b['booking_to'] }}</td>
                  

                    <td>
                      <a href="">Approve</a>

                    </td>
                    <td>
                      <a href="">Cancel</a>

                    </td>

                  </tr>
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
