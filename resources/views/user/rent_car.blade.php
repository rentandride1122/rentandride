@include('user.includes.header')



    <!--== Contact Page Area Start ==-->
    <section id="main-content">
      <section class="wrapper">
    <div class="contact-page-wrao section-padding" style="margin-top: 70px">
        <div class="row mt">
          <div class="col-lg-12">
           
            <div class="form-panel">
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
                    <div class=" form">
                    	<form class="cmxform form-horizontal style-form" action="{{ url('user/createcar') }}" method="POST" enctype="multipart/form-data">
						  <div class="form-group">
						    <label class="control-label col-lg-2">Car Name:</label>
						    <div class="col-lg-10">
						      <input type="text" name="car_name" class="form-control" placeholder="Enter car name" required="">
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="control-label col-lg-2" >Car Model:</label>
						    <div class="col-lg-10">
						      <input type="text" class="form-control" name="car_model" placeholder="Enter car model" required="">
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="control-label col-lg-2">Price:</label>
						    <div class="col-lg-10">
						      <input type="text" class="form-control" name="price" placeholder="Enter Price" required="">
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="control-label col-lg-2">Capacity (seats):</label>
						    <div class="col-lg-10">
						      <input type="number" class="form-control" name="capacity" placeholder="Enter capacity" required="">
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="control-label col-lg-2">Fuel Type:</label>
						    <div class="col-lg-10">
						      <select name="fuel_type" class="form-control">
						      	<option value="petrol">petrol</option>
						      	<option value="diseal">diseal</option>
						      </select>
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="control-label col-lg-2">Air Condition:</label>
						    <div class="col-lg-10">
						       <div class="form-control">
			                     <input type="radio" name="aircondition" value="yes">Yes
			                     <input type="radio" name="aircondition" value="no" checked="">No
                     			</div>
						    </div>
						  </div>
						   <div class="form-group">
			                    <label for="curl" class="control-label col-lg-2">Car Image</label>
			                    <div class="col-lg-10">
			                       <span class="btn btn-theme02 btn-file">
			                       
			                        <input type="file" class="fileupload-new " name="image" required="" />
			                        </span>
			                    </div>
			                  </div>
			                   <div class="form-group">
			                    <label for="curl" class="control-label col-lg-2">Citizenship Image</label>
			                    <div class="col-lg-10">
			                       <span class="btn btn-theme02 btn-file">
			                       
			                        <input type="file" class="fileupload-new " name="citizenship" required="" />
			                        </span>
			                    </div>
			                  </div>
			                   <div class="form-group">
			                    <label for="curl" class="control-label col-lg-2">BillBook Image</label>
			                    <div class="col-lg-10">
			                       <span class="btn btn-theme02 btn-file">
			                       
			                        <input type="file" name="billbook" required="" />
			                        </span>
			                    </div>
			                  </div>
			                  <div class="form-group ">
			                    <label for="ccomment" class="control-label col-lg-2">Description</label>
			                    <div class="col-lg-10">
			                      <textarea class="form-control " name="car_description" required></textarea>
			                    </div>
			                  </div>

			                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
						    <div class="col-lg-offset-2 col-lg-10">
						      <input type="submit" class="btn btn-primary" value="Rent">
						    </div>
						</div>
						</form>
					</div>

                </div>
            </div>
        </div>
    </div>
</section>
</section>
    <!--== Contact Page Area End ==-->




@include('user.includes.footer')