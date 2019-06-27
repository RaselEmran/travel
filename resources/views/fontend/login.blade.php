@extends('fontend.layouts.master')
@section('pageTitle') dashboard @endsection
@push('css')

@endpush
@section('page-header')
		<img src="{{asset('fontend/images/bg6.jpg')}}" class="bg1"/>

				<div class="centered3 titleimg9">

					<h2>Login with YuPa</h2>				

				</div>
@endsection

@section('content')



		<div class="row">

			<div id="content-login-form">

				<div class="container">

					<div class="row">	

						<div class="col-md-12">

						<center>

							<div class="login-boxes">

								<div class="row">

									<div class="col-md-12">

										<button id="fbBtn" class="form-control">

											<img src="{{asset('fontend/images/facebookicon.png')}}" class="fbicon" /> 

											<a href="{{ url('auth/facebook') }}" class="fbBtnText" style="color: #fff;text-decoration: none;">
												&nbsp;Sign up with Facebook
											</a>

										</button>

									</div>

								</div>

								<div class="row">

									<div class="col-md-12">

										<button id="googleBtn" class="form-control">

											<img src="{{asset('fontend/images/googleicon.png')}}" class="googleicon" /> 

											<a href="{{ url('auth/google') }}" class="googleBtnText" style="text-decoration: none;">&nbsp;&nbsp;Sign up with Google</a>

										</button>

									</div>

								</div>

								<div class="row">

									<div class="col-md-12">

										<p class="line"><span>or</span></p>

									</div>

								</div>

								<form action="{{ route('login') }}" class="form-validate" method="post">
								@csrf
									<div class="row input-space">

										<div class="col-md-12">

											<div class="inner-addon right-addon">

												<i class="glyphicon glyphicon-envelope"></i>

												<input type="text" id="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email Address" required value="{{ old('email') }}" />

											</div>

											@if ($errors->has('email'))
			                                    <span class="invalid-feedback" role="alert">
			                                        <strong>{{ $errors->first('email') }}</strong>
			                                    </span>
			                                @endif

										</div>

									</div>

									<div class="row input-space">

										<div class="col-md-12">

											<div class="inner-addon right-addon">

												<i class="glyphicon glyphicon-lock"></i>

												<input type="password" id="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required />

											</div>

										 @if ($errors->has('password'))
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $errors->first('password') }}</strong>
		                                    </span>
		                                @endif

										</div>

									</div>

									<div class="row input-space">

										<div class="col-md-6" style="text-align: left;">

											<input type="checkbox" style="margin: 5px;" id="check-remember" name="remember" value="1" />Remember

										</div>

										<div class="col-md-6" style="text-align: right;">

											<a id="show-password" onclick="showPass()">Show Password</a>

										</div>

									</div>

									<div class="row input-space">

										<div class="col-md-12">

											<input type="submit" id="login" class="btn btn-info form-control" name="loginbtn" value="Log in" />

										</div>

									</div>

									<div class="row input-space">

										<div class="col-md-12">

											<a id="forgot-password">Forgot password?</a>

										</div>

									</div>

									<div class="row">

										<div class="col-md-12">

											<hr style="margin: 10px 15px 10px 15px;">

										</div>

									</div>

									<div class="row">

										<div>

											<p>Don't have an account? <a href="{{ route('sign-up-option') }}" id="sign-up-link"> Sign up</a></p>

										</div>

									</div>

								</form>							

							</div>

							</center>

						</div>

					</div>

				</div>

			</div>

		</div>

@endsection

@push('js')

@endpush