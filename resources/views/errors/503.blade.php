@extends('layouts.front')

@section('content')
    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1 id="homeHeading">503</h1>
				<h2>Service Unavailable!</h2>
                <hr>
				@include('notifications.status_message')
				@include('notifications.errors_message')
                <p>Sorry, we are currently unable to handle your request. Why don't you go back to the <a href="{{ url('/') }}" >home page</a> or <a href="{{ url('/login') }}" >login to your account</a> or <a href="{{ url('/register') }}">register for an account</a> </p>
				
                
            </div>
        </div>
    </header>
	@if(config('app.debug'))
	<section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Details Below</h2>
                    <hr class="primary">
                    <p>{{ $exception }}</p>
                </div>
            </div>
        </div>
    </section>
	@endif
@endsection