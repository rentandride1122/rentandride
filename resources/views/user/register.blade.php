@include('user.includes.header')

  

    <!--== Login Page Content Start ==-->
    <section id="lgoin-page-wrap" class="section-padding" style="margin-top: 70px">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-8 m-auto">
                	<div class="login-page-content">
                		<div class="login-form" style="background: #00FFCC">
                			<h3>Sign Up</h3>
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
                       
							<form method="POST" action="{{ route('register') }}">
                                @csrf
								<div class="name">
									  <input id="name" placeholder="Full Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>
                                <div class="name">
                                      <input placeholder="Address" type="text" class="form-control @error('name') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="name">
                                      <input placeholder="Phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
								<div class="username">
									<input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>
								
								<div class="password">
									 <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>
                                <div class="password">
                                     <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                                
								<div class="log-btn">
									<button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
								</div>
							</form>
                		</div>
                		
                		<div class="create-ac">
                			<p>Have an account? <a href="{{ route('user.login') }}">Sign In</a></p>
                		</div>
                		<div class="login-menu">
                			<a href="about.html">About</a>
                			<span>|</span>
                			<a href="contact.html">Contact</a>
                		</div>
                	</div>
                </div>
        	</div>
        </div>
    </section>
    <!--== Login Page Content End ==-->
 @include('user.includes.footer')