@include('admin.includes.header')

@include('admin.includes.sidebar')

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
                    <p style="margin-left: 206px">By: {{ $car->user['email'] }}</p>
                   

                     <h4>ID: {{ $car['id'] }}</h4> 
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
                     <a href="#" class="btn btn-primary" style="margin-left: 10px">Post</a>
                     <a href="#" class="btn btn-danger" style="margin-left: 10px">Delete</a>
                     
                
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
