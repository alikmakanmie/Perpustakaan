@extends('layout.frontend')

@section('content')
<section class="banner-area" id="home">	
    <div class="container">
        <div class="row fullscreen d-flex align-items-center justify-content-start">
            <div class="banner-content col-lg-7">
                <h5 class="text-white text-uppercase">Register</h5>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="text-white">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_lengkap" class="text-white">Nama Lengkap</label>
                        <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required>
                        @error('nama_lengkap')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email" class="text-white">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat" class="text-white">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="text-white">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                   
                    <div class="form-group">
                        <p class="text-white">Already have an account? <a href="{{ route('login') }}" class="text-primary">Login here</a></p>
                    </div>
                    <button type="submit" class="primary-btn text-uppercase">Register</button>
                </form>
            </div>
            <div class="col-lg-5 banner-right">
                <img class="img-fluid" src="{{ asset('frontend/book-master/img/header-img.png') }}" alt="">
            </div>												
        </div>
    </div>
</section>
@endsection
