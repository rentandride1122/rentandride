@include('user.includes.header')

<!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Edit your car</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== Contact Page Area Start ==-->
    <div class="contact-page-wrao section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
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
                    
                    	<form action="{{ url('user/yourcar') }}" method="POST" enctype="multipart/form-data">
						  <div class="form-group">
						    <label class="control-label col-sm-2">Car Name:</label>
						    <div class="col-sm-10">
						      <input type="text" name="car_name" class="form-control" value="{{ $car['car_name'] }}" required="">
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="control-label col-sm-2" >Car Model:</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name="car_model" value="{{ $car['car_model'] }}" required="">
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="control-label col-sm-2">Price:</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name="price" value="{{ $car['price'] }}" required="">
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="control-label col-sm-2">Capacity (seats):</label>
						    <div class="col-sm-10">
						      <input type="number" class="form-control" name="capacity" value="{{ $car['capacity'] }}" required="">
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="control-label col-sm-2">Fuel Type:</label>
						    <div class="col-sm-10">
						      <select name="fuel_type" class="form-control">
						      	<option @if(old('fuel_type',$car['fuel_type']) == 'petrol') selected="" @endif value="petrol">petrol</option>
						      	<option @if(old('fuel_type',$car['fuel_type']) == 'diseal') selected="" @endif value="diseal">diseal</option>
						      </select>
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="control-label col-sm-2">Air Condition:</label>
						    <div class="col-sm-10">
						       <div class="form-control">
			                     <input type="radio" name="aircondition" value="yes" @if(old('aircondition',$car['aircondition']) == 'yes') checked="" @endif>Yes
			                     <input type="radio" name="aircondition" value="no" checked="" @if(old('aircondition',$car['aircondition']) == 'no') checked="" @endif>No
                     			</div>
						    </div>
						  </div>
						  
			                   
			                  <div class="form-group ">
			                    <label for="ccomment" class="control-label col-lg-2">Description</label>
			                    <div class="col-lg-10">
			                      <textarea class="form-control " name="car_description" required>{{ $car['car_description'] }}</textarea>
			                    </div>
			                  </div>

			                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
			                  <input type="hidden" name="_method" value="PUT">
                  			 

						<div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						      <input type="submit" class="btn btn-primary" value="Edit">
						    </div>
						</div>
						</form>

                </div>
            </div>
        </div>
    </div>
    <!--== Contact Page Area End ==-->




@include('user.includes.footer')