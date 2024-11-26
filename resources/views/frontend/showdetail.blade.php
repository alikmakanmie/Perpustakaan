@extends('layout.frontend')

@section('content')			
<!-- Start Book Detail Area -->
<section class="section-gap info-area" id="about">
				<div class="container">				
					<div class="single-info row mt-40 align-items-center">
						<div class="col-lg-6 col-md-12 text-center no-padding info-left">
							<div class="info-thumb">
                            <img class="img-fluid" src="{{ asset($buku->gambar) }}" alt="" width="500" height="600">
							</div>
						</div>
						<div class="col-lg-6 col-md-12 no-padding info-rigth">
							<div class="info-content">
								<h2 class="pb-30">{{ $buku->judul }}</h2>
								<div class="book-details">
									<p><strong>Penulis:</strong> {{ $buku->penulis }}</p>
									<p><strong>Penerbit:</strong> {{ $buku->penerbit }}</p>
									<p><strong>Tahun Terbit:</strong> {{ $buku->tahun_terbit }}</p>
									<br>
									<p><strong>Deskripsi:</strong></p>
									<p>{{ $buku->deskripsi }}</p>
								</div>
								<br>
								<a href="{{ route('peminjaman.create', ['buku_id' => $buku->id]) }}" class="btn btn-primary">Pinjam Buku</a>
							<a href="{{ route('koleksi.store', ['buku_id' => $buku->id]) }}" class="btn btn-success ml-2">Tambah ke Koleksi</a>
							</div>
						</div>
					</div>
				</div>
</section>
<!-- End Book Detail Area -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Komentar & Rating</h4>
                </div>
                <div class="card-body">
                    @auth
                    <form action="{{ route('komentar.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="buku_id" value="{{ $buku->id }}">
                        <div class="form-group">
                            <label>Rating</label>
                            <select class="form-control" name="rating" required>
                                <option value="1">1 - Sangat Buruk</option>
                                <option value="2">2 - Buruk</option>
                                <option value="3">3 - Cukup</option>
                                <option value="4">4 - Bagus</option>
                                <option value="5">5 - Sangat Bagus</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label>Komentar</label>
                            <textarea class="form-control" name="komentar" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Kirim Komentar</button>
                    </form>
                    @else
                    <div class="alert alert-info">
                        Silakan <a href="{{ route('login') }}">login</a> untuk memberikan komentar dan rating
                    </div>
                    @endauth

                    <div class="mt-4">
                        @if($komentar->count() > 0)
                            @foreach($komentar as $k)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $k->user->name }} - {{ $k->created_at->diffForHumans() }}</h6>
                                    <div class="mb-2">
                                        Rating: 
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $k->rating)
                                                <i class="fa fa-star text-warning"></i>
                                            @else
                                                <i class="fa fa-star-o"></i>
                                            @endif
                                        @endfor
                                    </div>
                                    <p class="card-text">{{ $k->komentar }}</p>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="alert alert-info">
                                Belum ada komentar untuk buku ini.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection