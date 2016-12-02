@extends('layouts.auth')

@section('title', 'Register')
@section('description', 'Register to the admin area')

@section('content')
	<div class="container">
		<div class="card-container text-center">
			<h1>Please Create Your Account</h1>
			<h2>Use the form below to register</h2>
		</div>
	</div>
    <div class="container">
    
		<div class="row">
		  @include('notifications.status_message')
		  @include('notifications.errors_message')
		  <div class="col-md-6">
			<div class="card-container text-center">
				<img src="assets/img/register-splash.jpg" alt="Tutorial Splash image">
			</div>
		  </div>
		  <div class="col-md-6">
			<div class="card card-container">
				<div class="client-feedback client-feedback-warning hidden">
				  <h4>Houston, We Have A Problem!</h4>
				  <p>Please fix the issues below.</p>
				</div>

				<div class="client-feedback client-feedback-success hidden">
				  <h4>Your A Champ!</h4>
				  <p>All your information checks out.</p>
				</div>
				<form class="form-signin" method="POST" action="{{ url('/register') }}" id="form-register" data-parsley-validate="">
					{{ csrf_field() }}
					<input type="text" id="username" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}" required autofocus data-parsley-required-message="A username is required" data-parsley-trigger="change focusout" data-parsley-minlength="3" data-parsley-maxlength="20">
					@if ($errors->has('username'))
						<span class="help-block">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
					@endif
					<input type="text" id="first_name" name="first_name" class="form-control" placeholder="First name" value="{{ old('first_name') }}"  required autofocus data-parsley-required-message="A first name is required" data-parsley-trigger="change focusout" data-parsley-pattern="/^[a-zA-Z]*$/" data-parsley-minlength="2" data-parsley-maxlength="32">
					@if ($errors->has('first_name'))
						<span class="help-block">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
					@endif
					<input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last name" value="{{ old('last_name') }}" required autofocus data-parsley-required-message="A last name is required" data-parsley-trigger="change focusout" data-parsley-pattern="/^[a-zA-Z]*$/" data-parsley-minlength="2" data-parsley-maxlength="32">
					@if ($errors->has('last_name'))
						<span class="help-block">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
					@endif
					<input type="email" id="email" name="email" class="form-control" placeholder="Email address" value="{{ old('email') }}" required autofocus data-parsley-required-message="An email address is required" data-parsley-trigger="change focusout" data-parsley-type="email">
					@if ($errors->has('email'))
						<span class="help-block">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
					@endif
					<input type="password" id="password" name="password" class="form-control" placeholder="Password" required  data-parsley-required-message="A password is required" data-parsley-trigger="change focusout" data-parsley-minlength="6" data-parsley-maxlength="20">
					@if ($errors->has('password'))
						<span class="help-block">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
					@endif
					<input type="password" id="password-confirm" name="password_confirmation" class="form-control" placeholder="Confirm Password" required  data-parsley-required-message="You must confirm your password" data-parsley-trigger="change focusout" data-parsley-minlength="6" data-parsley-maxlength="20" data-parsley-equalto="#password" data-parsley-equalto-message="Confirmation Password does not Match">
					<div class="g-recaptcha" data-sitekey="{{ env('SETTINGS_GOOGLE_RECAPTCHA_SITE_KEY') }}"></div>
					
					<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign up</button>
				</form><!-- /form -->
				<a href="{{ url('/password/forget') }}" class="forgot-password">Forgot password?</a> or <a href="{{ url('/username/forget') }}" class="forgot-password">Forgot username?</a>
			</div><!-- /card-container -->
		  </div>
		</div>

        
		<div class="card-container text-center">
			<a href="{{ url('/') }}" class="new-account">Back to Home page</a> or <a href="{{ url('/login') }}" class="new-account">Login</a> 
		</div>
		
    </div><!-- /container -->
@endsection

@section('scripts')
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="{!! asset('assets/js/plugins/parsley/parsley.js.') !!}"></script>
<script>
$(function () {
  $('#form-register').parsley().on('field:validated', function() {
    var ok = $('.parsley-error').length === 0;
    $('.client-feedback-success').toggleClass('hidden', !ok);
    $('.client-feedback-warning').toggleClass('hidden', ok);
  });
});
</script>
@endsection
