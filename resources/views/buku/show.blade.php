@extends('layout.dashboard')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="text-center mb-5">Detail Buku</h2>
            <div class="card">
                <div class="card-header">
                    <h3>{{ $buku->judul_buku }}</h3>
                </div>
                <div class="card-body">
                    <p><strong>Penulis:</strong> {{ $buku->pengarang }}</p>
                    <p><strong>Penerbit:</strong> {{ $buku->penerbit }}</p>
                    <p><strong>Tahun Terbit:</strong> {{ $buku->tahun_terbit }}</p>
                    <p><strong>Kode Buku:</strong> {{ $buku->kode_buku }}</p>
                    <p><strong>Sinopsis:</strong> {{ $buku->sinopsis }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('buku.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
