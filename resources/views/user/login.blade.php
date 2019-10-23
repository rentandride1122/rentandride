@include('user.includes.header')



    <!--== Login Page Content Start ==-->
    <section id="lgoin-page-wrap" class="section-padding" style="margin-top: 70px">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-8 m-auto">
                	<div class="login-page-content">
                		<div class="login-form" style="background: #00FFCC">
                			<h3>Welcome Back!</h3>
							<form method="POST" action="{{ route('login') }}">
                                @csrf
								<div class="username">
									<input id="email"placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>
								<div class="password">
									 <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>
								<div class="log-btn">
									<!-- <button type="submit"><i class="fa fa-sign-in"></i> Log In</button> -->
                                     <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
								</div>
							</form>
                		</div>
                		
                		
                		<div class="create-ac">
                			<p>Don't have an account? <a href="{{ route('user.register') }}">Sign Up</a></p>
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