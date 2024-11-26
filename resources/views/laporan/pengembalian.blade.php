@extends('layout.dashboard')

@section('title', 'Laporan Pengembalian')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Laporan Pengembalian</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('laporan.pengembalian') }}" method="GET" class="mb-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tanggal Awal</label>
                                        <input type="date" name="tanggal_awal" class="form-control" value="{{ $tanggal_awal }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tanggal Akhir</label>
                                        <input type="date" name="tanggal_akhir" class="form-control" value="{{ $tanggal_akhir }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>&nbsp;</label>
                                        <button type="submit" class="btn btn-primary btn-block">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Peminjam</th>
                                        <th>Buku</th>
                                        <th>Denda</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pengembalian as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ date('d/m/Y', strtotime($item->tanggal_pengembalian)) }}</td>
                                        <td>{{ $item->peminjaman->user->name }}</td>
                                        <td>{{ $item->peminjaman->buku->judul_buku }}</td>
                                        <td>Rp {{ number_format($item->denda, 0, ',', '.') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="text-right"><strong>Total Denda:</strong></td>
                                        <td><strong>Rp {{ number_format($pengembalian->sum('denda'), 0, ',', '.') }}</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="mt-3">
                            <a href="{{ route('laporan.pengembalian', ['type' => 'pdf'] + request()->all()) }}" class="btn btn-danger">
                                <i class="fa fa-file-pdf"></i> Download PDF
                            </a>
                            <button onclick="window.print()" class="btn btn-success">
                                <i class="fa fa-print"></i> Cetak
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @media print {
        .navbar, .sidebar, .card-header, form, .btn {
            display: none !important;
        }
        .card {
            border: none !important;
            box-shadow: none !important;
        }
    }
</style>
@endsection