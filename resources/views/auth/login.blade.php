@extends('layout.frontend')

@section('content')
<section class="banner-area" id="home">	
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-start">
						<div class="banner-content col-lg-7">
							<h5 class="text-white text-uppercase">Login</h5>
							<form method="POST" action="{{ route('login') }}">
								@csrf
								<div class="form-group">
									<label for="email" class="text-white">Email address</label>
									<input type="email" class="form-control" id="email" name="email" required>
								</div>
								<div class="form-group">
									<label for="password" class="text-white">Password</label>
									<input type="password" class="form-control" id="password" name="password" required>
								</div>
								<div class="form-group text-center">
									<div class="g-recaptcha mx-auto" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}" style="display: inline-block;"></div>
									@error('g-recaptcha-response')
										<span class="text-warning">{{ $message }}</span>
									@enderror
								</div>
								<div class="form-group">
									<p class="text-white">Don't have an account? <a href="{{ route('register') }}" class="text-primary">Register here</a></p>
								</div>
								<button type="submit" class="primary-btn text-uppercase">Login</button>
							</form>
						</div>
						<div class="col-lg-5 banner-right">
							<img class="img-fluid" src="{{ asset('frontend/book-master/img/header-img.png') }}" alt="">
						</div>												
					</div>
				</div>
			</section>
@endsection