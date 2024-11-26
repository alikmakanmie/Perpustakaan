@extends('layout.dashboard')

@section('title', 'Daftar Peminjaman')
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
                                            <th>Nama Peminjam</th>
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
                                        @forelse($peminjaman as $index => $item)
                                            @if(auth()->user()->role == 'admin' || auth()->user()->role == 'petugas' || auth()->user()->id == $item->user_id)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $item->user->name }}</td>
                                                <td>{{ $item->buku->judul_buku }}</td>
                                                <td>{{ $item->tanggal_pinjam }}</td>
                                                <td>{{ $item->tanggal_kembali }}</td>
                                                <td>{{ $item->status }}</td>
                                                <td>
                                                    @if(auth()->user()->role == 'admin' || auth()->user()->role == 'petugas')
                                                    <form action="{{ route('peminjaman.destroy', $item->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?')">
                                                            <i class="la la-trash"></i>
                                                        </button>
                                                    </form>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
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
