@extends('layouts.auth')

@section('title', 'Reset Password')
@section('description', 'Reset Your Password')

@section('content')
	<div class="container">
		<div class="card-container text-center">
			<h1>Reset Password</h1>
			<h2>Please provide your email address</h2>
			@if (session('status'))
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					{{ session('status') }}
				</div>
			@endif
			@if ($errors->has('email'))
				<div class="alert alert-danger fade in">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					{{ $errors->first('email') }}
				</div>
			@endif
			
		</div>
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" method="POST" action="{{ url('/password/reset') }}" data-parsley-validate="">
                {{ csrf_field() }}
				<input type="hidden" name="token" value="{{ $token }}">
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ $email or old('email') }}" required autofocus data-parsley-required-message="An email address is required" data-parsley-trigger="change focusout" data-parsley-type="email">
				@if ($errors->has('email'))
					<span class="help-block">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
				@endif
				<input type="password" id="password" name="password" class="form-control" placeholder="Password" required data-parsley-required-message="A password is required" data-parsley-trigger="change focusout" data-parsley-minlength="6" data-parsley-maxlength="20">
				@if ($errors->has('password'))
					<span class="help-block">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
				@endif
				<input type="password" id="password-confirm" name="password_confirmation" class="form-control" placeholder="Confirm Password" required data-parsley-required-message="You must confirm your password" data-parsley-trigger="change focusout" data-parsley-minlength="6" data-parsley-maxlength="20" data-parsley-equalto="#password" data-parsley-equalto-message="Confirmation Password does not Match">
				@if ($errors->has('password_confirmation'))
					<span class="help-block">
						<strong>{{ $errors->first('password_confirmation') }}</strong>
					</span>
				@endif
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Reset Password</button>
            </form><!-- /form -->
            <a href="{{ url('/username/reminder') }}" class="forgot-password">Forgot username?</a>
        </div><!-- /card-container -->
		<div class="card-container text-center">
			<a href="{{ url('/register') }}" class="new-account">Create an account</a> or <a href="{{ url('/login') }}" class="new-account">Login</a>
		</div>
		
    </div><!-- /container -->
@endsection

@section('scripts')
<script src="{!! asset('assets/js/plugins/parsley/parsley.js') !!}"></script>
@endsection
