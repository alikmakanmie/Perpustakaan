@extends('layout.dashboard')

@section('title', 'Buku')
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Buku</h4>
                        <a href="{{ route('buku.create') }}" class="btn btn-primary btn-sm float-right">
                            <i class="la la-plus"></i> Tambah Buku
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Judul</th>
                                        <th>Penulis</th>
                                        <th>Penerbit</th>
                                        <th>Tahun Terbit</th>
                                        <th>Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($buku as $item)
                                    <tr>
                                        <td>{{ ($buku->currentPage() - 1) * $buku->perPage() + $loop->iteration }}</td>
                                        <td><img src="{{ asset($item->gambar) }}" width="100" alt="Gambar Buku"></td>
                                        <td>{{ $item->judul_buku }}</td>
                                        <td>{{ $item->penulis }}</td>
                                        <td>{{ $item->penerbit }}</td>
                                        <td>{{ $item->tahun_terbit }}</td>
                                        <td>{{ $item->kategori->pluck('nama_kategori')->implode(', ') }}</td>
                                        <td>
                                            <a href="{{ route('buku.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                                <i class="la la-pencil"></i> Edit
                                            </a>
                                            <form action="{{ route('buku.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    <i class="la la-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Tidak ada data</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="mt-4 d-flex justify-content-center">
                            {{ $buku->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection