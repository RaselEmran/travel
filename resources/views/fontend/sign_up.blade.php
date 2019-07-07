@extends('fontend.layouts.master')
@section('pageTitle') dashboard @endsection
@push('css')

@endpush
@section('page-header')
	<img src="{{asset('fontend/images/bg7.jpg')}}" class="bg1"/>
				<div class="centered3 titleimg9">
					<h2>Sign up with YuPa</h2>
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
								<form method="POST" action="{{ route('register') }}">
								 @csrf
								 <div class="row input-space">
										<div class="col-md-12">
											<div class="inner-addon right-addon">
												<i class="glyphicon glyphicon-user"></i>
												<input type="text" id="name" class=" form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"" name="name" value="{{ old('name') }}" required autofocus placeholder="User name"/>
											</div>
											 @if ($errors->has('name'))
			                                    <span class="invalid-feedback" role="alert" style="color: red">
			                                        <strong>{{ $errors->first('name') }}</strong>
			                                    </span>
			                                @endif
										</div>
									</div>
									<div class="row input-space">
										<div class="col-md-12">
											<div class="inner-addon right-addon">
												<i class="glyphicon glyphicon-envelope"></i>
												<input type="text" id="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Email Address" />
											</div>
											 @if ($errors->has('email'))
			                                    <span class="invalid-feedback" role="alert" style="color: red">
			                                        <strong>{{ $errors->first('email') }}</strong>
			                                    </span>
			                                @endif
										</div>
									</div>
									<div class="row input-space">
										<div class="col-md-12">
											<div class="inner-addon right-addon">
												<i class="glyphicon glyphicon-lock"></i>
												<input type="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password" />
											</div>


			                                @if ($errors->has('password'))
			                                    <span class="invalid-feedback" role="alert" style="color: red">
			                                        <strong>{{ $errors->first('password') }}</strong>
			                                    </span>
			                                @endif
										</div>
									</div>

										<div class="row input-space">
										<div class="col-md-12">
											<div class="inner-addon right-addon">
												<i class="glyphicon glyphicon-lock"></i>
												 <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
											</div>



										</div>
									</div>
									<div class="row input-space">
										<div class="col-md-6">
										</div>
										<div class="col-md-6">
											<a id="show-password" onclick="showPass()">Show Password</a>
										</div>
									</div>
									<div class="row input-space">
										<div class="col-md-12">
											<div class="g-recaptcha" data-sitekey="6Ldbdg0TAAAAAI7KAf72Q6uagbWzWecTeBWmrCpJ"></div>
										</div>
									</div>
									<div class="row input-space">
										<div class="col-md-12">
											<input type="submit" id="signup" class="btn btn-info form-control" name="signupbtn" value="Sign up" />
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<hr style="margin: 10px 15px 10px 15px;">
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<p>Already have an account? <a href="{{ route('login') }}" id="login-link"> Log in</a></p>
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
@push('css')

@endpush