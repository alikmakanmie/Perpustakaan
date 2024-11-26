@extends('layout.dashboard')

@section('title', 'Kategori')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Kategori</h4>
                            <a href="{{ route('kategori.create') }}" class="btn btn-primary btn-sm float-right">
                                <i class="la la-plus"></i> Tambah Kategori
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($kategori as $kategori)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $kategori->nama_kategori }}</td>
                                                    <td>
                                                    <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-warning btn-sm">
                                                        <i class="la la-pencil"></i>
                                                    </a>
                                                    <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                            <i class="la la-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">Tidak ada data</td>
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
