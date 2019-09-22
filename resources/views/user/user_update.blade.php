@include('user.includes.header')

<!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Update Profile</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Protected</p>
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
                	   
                    
                    	<form action="" method="POST" enctype="multipart/form-data">
						  <div class="form-group">
						    <label class="control-label col-sm-2">Username:</label>
						    <div class="col-sm-10">
						      <input type="text" name="name" class="form-control" placeholder="Username" required="">
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="control-label col-sm-2" >Email:</label>
						    <div class="col-sm-10">
						      <input type="email" class="form-control" name="model" placeholder="Email" required="">
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="control-label col-sm-2">Phone:</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name="price" placeholder="Phone Number" required="">
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="control-label col-sm-2">Address:</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name="capacity" placeholder="Address" required="">
						    </div>
						  </div>
						    <div class="form-group">
						    <label class="control-label col-sm-2">Password:</label>
						    <div class="col-sm-10">
						      <input type="password" class="form-control" name="capacity" placeholder="Password" required="">
						    </div>
						  </div>

			                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  			  <input type="hidden" name="type" value="private">

						<div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						      <input type="submit" class="btn btn-primary" value="Update">
						    </div>
						</div>
						</form>

                </div>
            </div>
        </div>
    </div>
    <!--== Contact Page Area End ==-->

@include('user.includes.footer')