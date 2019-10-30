@include('user.includes.header')



    <!--== Contact Page Area Start ==-->
    <div class="contact-page-wrao section-padding" style="margin-top: 70px">
        <div class="container">

            <div class="row">

                <div class="col-lg-10 m-auto">
                	   
                   
                    	<form method="POST" action="{{ url('user/updateuser') }}" enctype="multipart/form-data">
						  <div class="form-group">
						    <label class="control-label col-sm-2">Full name</label>
						    <div class="col-sm-10">
						      <input type="text" name="name" class="form-control" value="{{ $user['name'] }}" required="">
						    </div>
						  </div>
						  
						  <div class="form-group">
						    <label class="control-label col-sm-2">Phone:</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name="phone" value="{{ $user['phone'] }}" required="">

						    </div>
						  </div>
						  <div class="form-group">
						    <label class="control-label col-sm-2">Address:</label>
						    <div class="col-sm-10">

						      <input type="text" class="form-control" name="address" value="{{ $user['address'] }}" required="">
						    </div>
						  </div>
						   
			                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  			  <input type="hidden" name="_method" value="PUT">

						<div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						      <input type="submit" class="btn btn-success" value="Update">
                              

						    </div>
						</div>
						</form>


                </div>
            </div>
        </div>
    </div>
    <!--== Contact Page Area End ==-->

@include('user.includes.footer')