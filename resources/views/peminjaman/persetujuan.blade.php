@extends('layout.dashboard')

@section('title', 'Persetujuan Peminjaman')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Peminjaman Menunggu Persetujuan</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Peminjam</th>
                                            <th>Buku</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($peminjaman as $pinjam)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $pinjam->buku->judul_buku }}</td>
                                                <td>{{ $pinjam->tanggal_pinjam }}</td>
                                                <td>{{ $pinjam->tanggal_kembali }}</td>
                                                <td>{{ $pinjam->status }}</td>
                                                <td>
                                                    @if($pinjam->status == 'disetujui')
                                                        <form action="{{ route('peminjaman.updateStatus', $pinjam->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" class="btn btn-success btn-sm">
                                                                <i class="la la-check"></i> Setuju
                                                            </button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('peminjaman.setujui', $pinjam->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" class="btn btn-success btn-sm">
                                                                <i class="la la-check"></i> Setujui
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('peminjaman.tolak', $pinjam->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                <i class="la la-times"></i> Tolak
                                                            </button>
                                                        </form>
                                                    @endif
                                                </td>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">Tidak ada peminjaman yang menunggu persetujuan</td>
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
