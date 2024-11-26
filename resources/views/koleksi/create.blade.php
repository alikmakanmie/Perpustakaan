@extends('layout.dashboard')

@section('title', 'Tambah Koleksi')
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Koleksi Buku</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('koleksi.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="buku_id">Pilih Buku</label>
                                <select class="form-control @error('buku_id') is-invalid @enderror" id="buku_id" name="buku_id">
                                    <option value="">Pilih Buku</option>
                                    @foreach($buku as $b)
                                    <option value="{{ $b->id }}" {{ old('buku_id') == $b->id ? 'selected' : '' }}>
                                        {{ $b->judul_buku }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('buku_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('koleksi.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection