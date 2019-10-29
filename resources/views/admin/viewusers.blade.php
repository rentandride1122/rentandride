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
            <a class="active" href="{{ url('admin/view/users') }}">
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
      <section class="wrapper" style="height: 1000px">
        <h3><i class="fa fa-angle-right"></i>User Details</h3>

        Total: {{ $users_count->count()}}


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
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                 
                    <th>Registered at</th>
                    
                   
                  </tr>
                </thead>
                <tbody>

                  @foreach($users as $u)
                  <tr>
                    <td>{{ $u['name'] }}</td>
                    <td>{{ $u['email'] }}</td>
                    <td>{{ $u['address'] }}</td>
                    <td>{{ $u['phone'] }}</td>
                    <td>{{ $u['created_at']->diffForHumans() }}</td>
                 
                   
                  </tr>
                  @endforeach
               
                </tbody>
              </table>

              {{ $users->links()}}


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
