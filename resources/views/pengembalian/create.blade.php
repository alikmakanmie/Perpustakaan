@extends('layout.dashboard')

@section('title', 'Tambah Pengembalian')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Tambah Pengembalian</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('pengembalian.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="peminjaman_id">Peminjaman</label>
                                <select class="form-control" id="peminjaman_id" name="peminjaman_id" required>
                                    <option value="">Pilih Peminjaman</option>
                                    @foreach($peminjaman as $p)
                                        <option value="{{ $p->id }}">
                                            {{ $p->user->name }} - {{ $p->buku->judul_buku }} - Tanggal Pinjam: {{ $p->tanggal_pinjam }} - Tanggal Kembali: {{ $p->tanggal_kembali }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
                                <input type="date" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian" required>
                            </div>

                            <div class="card-action">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="{{ route('pengembalian.index') }}" class="btn btn-danger">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection