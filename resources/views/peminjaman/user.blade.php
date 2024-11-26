@extends('layout.dashboard')

@section('title', 'Peminjaman')
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Peminjaman</h4>
                        <a href="{{ route('peminjaman.create') }}" class="btn btn-primary btn-sm float-right">
                            <i class="la la-plus"></i> Tambah Peminjaman
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul Buku</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Status</th>
                                        @if(auth()->user()->role == 'admin' || auth()->user()->role == 'petugas')
                                        <th>Aksi</th>
                                        @endif

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($peminjaman->where('user_id', auth()->id()) as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->buku->judul_buku }}</td>
                                        <td>{{ $item->tanggal_pinjam }}</td>
                                        <td>{{ $item->tanggal_kembali }}</td>
                                        <td>{{ $item->status }}</td>

                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Tidak ada data</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection