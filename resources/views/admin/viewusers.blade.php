@include('admin.includes.header')

@include('admin.includes.sidebar')

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
