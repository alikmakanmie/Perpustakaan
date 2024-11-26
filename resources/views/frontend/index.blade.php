@extends('layout.frontend')

@section('content')


<section class="banner-area" id="home">
	<div class="container">
		<div class="row fullscreen d-flex align-items-center justify-content-start">
			<div class="banner-content col-lg-7">
				<h5 class="text-white text-uppercase">Author: Travor James</h5>
				<h1 class="text-uppercase">
					New Adventure
				</h1>
				<p class="text-white pt-20 pb-20">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp <br> or incididunt ut labore et dolore magna aliqua. Ut enim ad minim.
				</p>
				<a href="#" class="primary-btn text-uppercase">Buy Now for $9.99</a>
			</div>
			<div class="col-lg-5 banner-right">
				<img class="img-fluid" src="{{ asset('frontend/book-master/img/header-img.png') }}" alt="">
			</div>
		</div>
	</div>
</section>
<!-- End banner Area -->

<!-- Start about Area -->
<section class="section-gap info-area" id="about">
	<div class="container">
		<div class="single-info row mt-40 align-items-center">
			<div class="col-lg-6 col-md-12 text-center no-padding info-left">
				<div class="info-thumb">
					<img src="{{ asset('frontend/book-master/img/about-img.jpg') }}" class="img-fluid info-img" alt="">
				</div>
			</div>
			<div class="col-lg-6 col-md-12 no-padding info-rigth">
				<div class="info-content">
					<h2 class="pb-30">Dr. Travor James</h2>
					<p>
						inappropriate behavior is often laughed off as "boys will be boys," women face higher conduct standards – especially in the workplace. That's why it's crucial that, as women.
					</p>
					<br>
					<p>
						inappropriate behavior is often laughed off as "boys will be boys," women face higher conduct standards – especially in the workplace. That's why it's crucial that, as women. inappropriate behavior is often laughed off as "boys will be boys," women face higher conduct standards – especially in the workplace. That's why it's crucial that, as women.
					</p>
					<br>
					<img src="{{ asset('frontend/book-master/img/signature.png') }}" alt="">
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End about Area -->

<!-- Start fact Area -->
<section class="fact-area relative section-gap" id="fact">
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-40 col-lg-8">
				<div class="title text-center">
					<h1 class="mb-10">Some Features that Made us Unique</h1>
					<p>Who are in extremely love with eco friendly system.</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End fact Area -->

<!-- Start counter Area -->
<section class="counter-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<div class="single-counter">
					<h1 class="counter">2536</h1>
					<p>Happy Clients</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="single-counter">
					<h1 class="counter">6784</h1>
					<p>Total Projects</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="single-counter">
					<h1 class="counter">1059</h1>
					<p>Cups Coffee</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="single-counter">
					<h1 class="counter">12239</h1>
					<p>Tickets Submitted</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- end counter Area -->

<!-- Start price Area -->
<section class="price-area section-gap" id="price">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-60 col-lg-8">
				<div class="title text-center">
					<h1 class="mb-10">Purchase whatever you want</h1>
					<p>Who are in extremely love with eco friendly system.</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<div class="single-price no-padding">
					<div class="price-top">
						<h4>PDF</h4>
					</div>
					<p>
						Who are in extremely love with <br>
						eco friendly system.
					</p>
					<div class="price-bottom">
						<h1><span>$</span> 79.99</h1>
						<a href="#" class="primary-btn header-btn">Purchase Now</a>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="single-price no-padding">
					<div class="price-top">
						<h4>E-Book</h4>
					</div>
					<p>
						Who are in extremely love with <br>
						eco friendly system.
					</p>
					<div class="price-bottom">
						<h1><span>$</span> 99.99</h1>
						<a href="#" class="primary-btn header-btn">Purchase Now</a>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="single-price no-padding">
					<div class="price-top">
						<h4>Print Copy</h4>
					</div>
					<p>
						Who are in extremely love with <br>
						eco friendly system.
					</p>
					<div class="price-bottom">
						<h1><span>$</span> 59.99</h1>
						<a href="#" class="primary-btn">Purchase Now</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End price Area -->

<!-- Start course Area -->
<section class="course-area section-gap" id="course">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-60 col-lg-9">
				<div class="title text-center">
					<h1 class="mb-10">Top Courses That are open for Students</h1>
					<p>Who are in extremely love with eco friendly system.</p>
				</div>
			</div>
		</div>
		<div class="row">
			@if(count($buku) == 1)
				<div class="col-lg-4 offset-lg-4">
					<div class="single-course item">
						<a href="{{ route('showdetail', $buku[0]->id) }}" style="text-decoration: none; color: inherit;">
							<img class="img-fluid" src="{{ asset($buku[0]->gambar) }}" alt="">
							<p class="sale-btn">Lihat Buku</p>
							<div class="details">
								<h4>{{ $buku[0]->judul_buku }}</h4>
								<p>
									Penulis: {{ $buku[0]->penulis }} <br>
									Penerbit: {{ $buku[0]->penerbit }} <br>
									Tahun Terbit: {{ $buku[0]->tahun_terbit }}
								</p>
							</div>
						</a>
					</div>
				</div>
			@elseif(count($buku) <= 3)
				<div class="active-course-carusel">
					@foreach($buku as $item)
					<div class="single-course item">
						<img class="img-fluid" src="{{ asset($item->gambar) }}" alt="">
						<a class="sale-btn" href="{{ route('showdetail', $item->id) }}">Lihat Buku</a>
						<div class="details">
							<a href="{{ route('showdetail', $item->id) }}">
								<h4>{{ $item->judul_buku }} </h4>
							</a>
							<p>
								Penulis: {{ $item->penulis }} <br>
								Penerbit: {{ $item->penerbit }} <br>
								Tahun Terbit: {{ $item->tahun_terbit }}
							</p>
						</div>
					</div>
					@endforeach
				</div>
			@else
				@forelse($buku as $item)
				<div class="col-lg-4">
					<div class="single-course item">
						<img class="img-fluid" src="{{ asset($item->gambar) }}" alt="">
						<a class="sale-btn" href="{{ route('showdetail', $item->id) }}">Lihat Buku</a>
						<div class="details">
							<a href="{{ route('showdetail', $item->id) }}">
								<h4>{{ $item->judul_buku }}</h4>
							</a>
							<p>
								Penulis: {{ $item->penulis }} <br>
								Penerbit: {{ $item->penerbit }} <br>
								Tahun Terbit: {{ $item->tahun_terbit }}
							</p>
						</div>
					</div>
				</div>
				@empty
				<div class="col-12 text-center">
					<p>Tidak ada data buku</p>
				</div>
				@endforelse
			@endif
		</div>
		<div class="d-flex justify-content-center">
			<a href="{{ route('show.more') }}" class="primary-btn">Show More</a>
		</div>
	</div>
</section>
<!-- End course Area -->

<!-- Start call-to-action Area -->
<section class="call-to-action-area section-gap">
	<div class="container">
		<div class="row justify-content-center top">
			<div class="col-lg-12">
				<h1 class="text-white text-center">Download Our App for all Platforms</h1>
				<p class="text-white text-center mt-30">
					It won't be a bigger problem to find one video game lover in your neighbor. Since the introduction of Virtual Game, it has been achieving great heights so far as its popularity and technological advancement are concerned.
				</p>
			</div>
		</div>
		<div class="row justify-content-center d-flex">
			<div class="download-button d-flex flex-row justify-content-center mt-30">
				<div class="buttons flex-row d-flex">
					<i class="fa fa-apple" aria-hidden="true"></i>
					<div class="desc">
						<a href="#">
							<p>
								<span>Available</span> <br>
								on App Store
							</p>
						</a>
					</div>
				</div>
				<div class="buttons flex-row d-flex">
					<i class="fa fa-android" aria-hidden="true"></i>
					<div class="desc">
						<a href="#">
							<p>
								<span>Available</span> <br>
								on Play Store
							</p>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End call-to-action Area -->

<!-- Start testomial Area -->
<section class="testomial-area section-gap">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-60 col-lg-8">
				<div class="title text-center">
					<h1 class="mb-10">What our Reader's Say about us</h1>
					<p>Who are in extremely love with eco friendly system.</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="active-tstimonial-carusel">
				<div class="single-testimonial item">
					<img class="mx-auto" src="{{ asset('frontend/book-master/img/t1.png') }}" alt="">
					<p class="desc">
						Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
					</p>
					<h4>Mark Alviro Wiens</h4>
					<p>
						CEO at Google
					</p>
				</div>
				<div class="single-testimonial item">
					<img class="mx-auto" src="{{ asset('frontend/book-master/img/t2.png') }}" alt="">
					<p class="desc">
						Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
					</p>
					<h4>Mark Alviro Wiens</h4>
					<p>
						CEO at Google
					</p>
				</div>
				<div class="single-testimonial item">
					<img class="mx-auto" src="{{ asset('frontend/book-master/img/t3.png') }}" alt="">
					<p class="desc">
						Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
					</p>
					<h4>Mark Alviro Wiens</h4>
					<p>
						CEO at Google
					</p>
				</div>
				<div class="single-testimonial item">
					<img class="mx-auto" src="{{ asset('frontend/book-master/img/t1.png') }}" alt="">
					<p class="desc">
						Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
					</p>
					<h4>Mark Alviro Wiens</h4>
					<p>
						CEO at Google
					</p>
				</div>
				<div class="single-testimonial item">
					<img class="mx-auto" src="{{ asset('frontend/book-master/img/t2.png') }}" alt="">
					<p class="desc">
						Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
					</p>
					<h4>Mark Alviro Wiens</h4>
					<p>
						CEO at Google
					</p>
				</div>
				<div class="single-testimonial item">
					<img class="mx-auto" src="{{ asset('frontend/book-master/img/t3.png') }}" alt="">
					<p class="desc">
						Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
					</p>
					<h4>Mark Alviro Wiens</h4>
					<p>
						CEO at Google
					</p>
				</div>
				<div class="single-testimonial item">
					<img class="mx-auto" src="{{ asset('frontend/book-master/img/t1.png') }}" alt="">
					<p class="desc">
						Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
					</p>
					<h4>Mark Alviro Wiens</h4>
					<p>
						CEO at Google
					</p>
				</div>
				<div class="single-testimonial item">
					<img class="mx-auto" src="{{ asset('frontend/book-master/img/t2.png') }}" alt="">
					<p class="desc">
						Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
					</p>
					<h4>Mark Alviro Wiens</h4>
					<p>
						CEO at Google
					</p>
				</div>
				<div class="single-testimonial item">
					<img class="mx-auto" src="{{ asset('frontend/book-master/img/t3.png') }}" alt="">
					<p class="desc">
						Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
					</p>
					<h4>Mark Alviro Wiens</h4>
					<p>
						CEO at Google
					</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End testomial Area -->
@endsection