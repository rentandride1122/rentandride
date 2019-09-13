@include('admin.includes.header')

@include('admin.includes.sidebar')


<!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>Update Car Details</h3>

  
        
        <!-- FORM VALIDATION -->
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
                <form class="cmxform form-horizontal style-form" method="POST" enctype="multipart/form-data" action="{{ url('admin/updatecar') }}">
                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">Name</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="cname" name="name" value="{{ $car['car_name'] }}" type="text" required />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">Model</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="cname" name="model" value="{{ $car['car_model'] }}" type="text" required />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="cemail" class="control-label col-lg-2">Price</label>
                    <div class="col-lg-10">
                      <input class="form-control " id="cemail" type="text" value="{{ $car['price'] }}" name="price" required />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">Capacity (seats)</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="cname" name="capacity" value="{{ $car['capacity'] }}" type="number" required />
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="curl" class="control-label col-lg-2">Image Upload (If changing)</label>
                    <div class="col-lg-10">
                       <span class="btn btn-theme02 btn-file">
                        <!--   <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span> -->
                        <img src = "{{ URL::to('/').'/uploads/'.$car['image'] }}" height="120px" />
                      
                        <input type="file" class="fileupload-new " name="image"  />
                        </span>
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="ccomment" class="control-label col-lg-2">Description</label>
                    <div class="col-lg-10">
                      <textarea class="form-control " id="ccomment" name="description" required>{{ $car['car_description'] }}</textarea>
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="ccomment" class="control-label col-lg-2">Fuel Type</label>
                    <div class="col-lg-10">
                     <!--  <textarea class="form-control " id="ccomment" name="description" required></textarea> -->
                     <select class="form-control" name="fuel_type">
                       <option  @if(old('fuel_type',$car['fuel_type']) == 'petrol') selected="" @endif value="petrol">petrol</option>
                       <option @if(old('fuel_type',$car['fuel_type']) == 'diseal') selected="" @endif value="diseal">diseal</option>
                     </select>
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="ccomment" class="control-label col-lg-2">Air Condition</label>
                    <div class="col-lg-10">
                     <!--  <textarea class="form-control " id="ccomment" name="description" required></textarea> -->
                     <div class="form-control">
                     <input type="radio" name="ac" value="yes" @if(old('aircondition',$car['aircondition']) == 'yes') checked="" @endif>Yes
                     <input type="radio" name="ac" value="no" @if(old('aircondition',$car['aircondition']) == 'no') checked="" @endif>No
                     </div>
                    </div>
                  </div>

                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type = 'hidden' name = '_method' value = 'PUT' />
                  <input type = 'hidden' name = 'id' value = "{{ $car['id']}}" />
                  <input type = 'hidden' name = 'oldimage' value = "{{ $car['image']}}" />
                  
                  <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme" type="submit">Save Changes</button>
                      <!-- <button class="btn btn-theme04" type="button">Cancel</button> -->
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
        
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->


@include('admin.includes.footer')