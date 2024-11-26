@extends('layout.frontend')

@section('content')

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
			@forelse($buku as $item)
			<div class="col-lg-4">
				<div class="single-course item">
					<a href="{{ route('showdetail', $item->id) }}">
						<img class="img-fluid" src="{{ asset($item->gambar) }}" alt="">
					</a>
					<p class="sale-btn" href="{{ route('showdetail', $item->id) }}">Lihat Buku</p>
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
		</div>
		
	</div>
</section>
<!-- End course Area -->

@endsection
