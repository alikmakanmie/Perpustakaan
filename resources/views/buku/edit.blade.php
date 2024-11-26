@extends('layout.dashboard')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Buku</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="judul">Judul Buku</label>
                                        <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="Masukkan judul buku" value="{{ old('judul', $buku->judul_buku) }}" required>
                                        @error('judul')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="penulis">Penulis</label>
                                        <input type="text" name="penulis" class="form-control @error('penulis') is-invalid @enderror" id="penulis" placeholder="Masukkan nama penulis" value="{{ old('penulis', $buku->penulis) }}" required>
                                        @error('penulis')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="penerbit">Penerbit</label>
                                        <input type="text" name="penerbit" class="form-control @error('penerbit') is-invalid @enderror" id="penerbit" placeholder="Masukkan nama penerbit" value="{{ old('penerbit', $buku->penerbit) }}" required>
                                        @error('penerbit')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tahun_terbit">Tahun Terbit</label>
                                        <input type="date" name="tahun_terbit" class="form-control @error('tahun_terbit') is-invalid @enderror" id="tahun_terbit" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}" required>
                                        @error('tahun_terbit')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="kategori_id">Kategori Buku</label>
                                        <select name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror" id="kategori_id" required>
                                            <option value="">Pilih Kategori</option>
                                            @foreach ($kategori as $item)
                                                <option value="{{ $item->id }}" {{ $buku->kategori->contains($item->id) ? 'selected' : '' }}>
                                                    {{ $item->nama_kategori }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('kategori_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="gambar">Upload Gambar</label>
                                        <div class="custom-file">
                                            <input type="file" name="gambar" class="custom-file-input @error('gambar') is-invalid @enderror" id="gambar">
                                            <label class="custom-file-label" for="gambar">Pilih file</label>
                                            @error('gambar')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <small class="form-text text-muted">
                                            <i class="fas fa-info-circle"></i>
                                            Format yang didukung: JPG, JPEG, PNG (Maks. 2MB)
                                        </small>
                                        @if($buku->gambar)
                                            <div class="mt-2">
                                                <img src="{{ asset($buku->gambar) }}" alt="Current Image" class="img-thumbnail" width="200">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Update
                                </button>
                                <a href="{{ route('buku.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
