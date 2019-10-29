<aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="#"><img src="{{ asset('images/ferrari1.jfif')}}" class="img-circle" width="80"></a></p>
          <h5 class="centered">Rent and Ride</h5>
          <li class="mt">
            <a class="active" href="{{ url('admin/index') }}">
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