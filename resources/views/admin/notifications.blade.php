@include('admin.includes.header')

@include('admin.includes.sidebar')

<!--main content start-->
    <section id="main-content">
      <section class="wrapper" style="height: 1000px">
        <h3><i class="fa fa-angle-right"></i>Notifications</h3>

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
                    
                    <th>Notifications</th>
                    <th>Time</th>
                   
                    
                  </tr>
                </thead>
                <tbody>

                 @foreach(auth()->user()->notifications as $notification)

                 
                  <tr>
                    
                    <td>{{ $notification->data['data'] }}</td>
                    <td>{{ $notification['created_at']->diffForHumans() }}</td>
                   
                  </tr>
                  @endforeach
               
                </tbody>
              </table>

             


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
