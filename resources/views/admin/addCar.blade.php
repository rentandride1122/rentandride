@include('admin.includes.header')

@include('admin.includes.sidebar')


<!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>Add Car</h3>

  
        
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
                <form class="cmxform form-horizontal style-form" method="POST" enctype="multipart/form-data" action="{{ url('admin/createcar') }}">
                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">Name</label>
                    <div class="col-lg-10">
                      <input class=" form-control" value="{{ old('name') }}" name="name" minlength="2" type="text" required />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">Model</label>
                    <div class="col-lg-10">
                      <input class=" form-control" value="{{ old('model') }}" name="model" minlength="2" type="text" required />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="cemail" class="control-label col-lg-2">Price</label>
                    <div class="col-lg-10">
                      <input class="form-control " value="{{ old('price') }}" type="text" name="price" required />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">Capacity (seats)</label>
                    <div class="col-lg-10">
                      <input class=" form-control" value="{{ old('capacity') }}" name="capacity" type="number" required />
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="curl" class="control-label col-lg-2">Image Upload</label>
                    <div class="col-lg-10">
                       <span class="btn btn-theme02 btn-file">
                        <!--   <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span> -->
                      
                        <input type="file" class="fileupload-new " name="image" required="" />
                        </span>
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="ccomment" class="control-label col-lg-2">Description</label>
                    <div class="col-lg-10">
                      <textarea class="form-control" name="description" required>{{ old('description') }}</textarea>
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="ccomment" class="control-label col-lg-2">Fuel Type</label>
                    <div class="col-lg-10">
                     <!--  <textarea class="form-control " id="ccomment" name="description" required></textarea> -->
                     <select class="form-control" name="fuel_type">
                       <option value="petrol">Petrol</option>
                       <option value="diseal">Diseal</option>
                     </select>
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="ccomment" class="control-label col-lg-2">Air Condition</label>
                    <div class="col-lg-10">
                     <!--  <textarea class="form-control " id="ccomment" name="description" required></textarea> -->
                     <div class="form-control">
                     <input type="radio" name="ac" value="yes">Yes
                     <input type="radio" name="ac" value="no" checked="">No
                     </div>
                    </div>
                  </div>
                 
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="type" value="company">
                  <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme" type="submit">Save</button>
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