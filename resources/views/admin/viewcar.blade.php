@include('admin.includes.header')

@include('admin.includes.sidebar')

<!--main content start-->
    <section id="main-content">
      <section class="wrapper" style="height: 1000px">
        <h3><i class="fa fa-angle-right"></i>Car Details</h3>

        Total: {{ $car->count()}}


        
           
        
        <!-- row -->
        <div class="row mt">

          <div class="col-md-12">
             <a href="{{ url('admin/createcar') }}" class="btn btn-theme" >Add Car</a>
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
                    <th>ID</th>
                    <th>Name</th>
                    <th>Model</th>
                    <th>Descrition</th>
                    <th>Price (Rs)</th>
                 
                    <th>Capacity (seats)</th>
                    <th>Image</th>
                    <th>Fuel Type</th>
                    <th>Air Condition</th>
                    <th>Time</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>

                  @foreach($cars as $c)

                 
                  <tr>
                    <td>{{ $c['id'] }}</td>
                    <td>{{ $c['car_name'] }}</td>
                    <td>{{ $c['car_model'] }}</td>
                    <td>{{ $c['car_description'] }}</td>
                    <td>{{ $c['price'] }}</td>
                    <td>{{ $c['capacity'] }}</td>
                    <td><img style = "height:120px; width:auto;' >" src = "{{ URL::to('/').'/uploads/'.$c['image'] }}"> </td>
                    <td>{{ $c['fuel_type'] }}</td>
                    <td>{{ $c['aircondition'] }}</td>
                    <td>{{ $c['created_at']->diffForHumans() }}</td>
                   


                   <!--  <td><span class="label label-info label-mini">Due</span></td> -->
                    <td>
                     <!--  <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button> -->

                      <a href="{{ url('/admin/updatecar/'.$c['id']) }}" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></a>

                   

                      <form action = "{{ url('admin/deletecar') }}" method = 'POST'>

                      <input type = 'hidden' name = 'id' value = "{{ $c['id'] }}" />
                      <input type = 'hidden' name = '_token' value = '{{ csrf_token() }}' />
                      <input type = 'hidden' name = '_method' value = 'DELETE' />
                     <button style="height: 22px" class="btn btn-danger btn-xs fa fa-trash-o"></button>
                      </form>

                      <!-- <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a> -->
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
