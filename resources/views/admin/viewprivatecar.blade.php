@include('admin.includes.header')

@include('admin.includes.sidebar')

<!--main content start-->
    <section id="main-content">
      <section class="wrapper" style="height: 1000px">
        <h3><i class="fa fa-angle-right"></i>Private Car Details</h3>

        Total: {{ $car->count()}}

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
                    <th>Posted By</th>
                    <th>Remarks</th>
                    <th>Time</th>
                
                  </tr>
                </thead>
                <tbody>

                  @foreach($cars as $c)
                  <tr>
                   
                    <td>{{ $c['car_name'] }}</td>
                    <td>{{ $c['car_model'] }}</td>
                    
                    <td>{{ $c['price'] }}</td>
                    <td><img style = "height:120px; width:auto;' >" src = "{{ URL::to('/').'/uploads/'.$c['image'] }}"> </td>
                   <td>{{ $c->user['email'] }}</td>
                   <td>{{ $c['remarks'] }}</td>
                   <td>{{ $c['created_at']->diffForHumans() }}</td>

                    <td>
                      <a href="{{ url('admin/viewprivatecar/'.$c['id'] ) }}">View</a>

                    </td>
                  </tr>
                  @endforeach
               
                </tbody>
              </table>

              {{ $cars->links()}}


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
