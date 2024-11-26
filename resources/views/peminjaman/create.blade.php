@extends('layout.dashboard')

@section('title', 'Tambah Peminjaman')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Peminjaman</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('peminjaman.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="buku_id">Buku</label>
                                <select name="buku_id" id="buku_id" class="form-control @error('buku_id') is-invalid @enderror">
                                    <option value="">Pilih Buku</option>
                                    @foreach($buku as $item)
                                        @if(request()->get('buku_id') == $item->id)
                                            <option value="{{ $item->id }}" selected>{{ $item->judul_buku }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->judul_buku }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('buku_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tanggal_pinjam">Tanggal Pinjam</label>
                                <input type="date" name="tanggal_pinjam" id="tanggal_pinjam"
                                value="{{ old('tanggal_pinjam', date('Y-m-d')) }}"
                                min="{{ date('Y-m-d') }}"
                                 class="form-control @error('tanggal_pinjam') is-invalid @enderror">
                                @error('tanggal_pinjam')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tanggal_kembali">Tanggal Kembali</label>
                                <input type="date" name="tanggal_kembali" id="tanggal_kembali" 
                                    class="form-control @error('tanggal_kembali') is-invalid @enderror"
                                    write>
                                @error('tanggal_kembali')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div id="dateWarning" class="text-danger" style="display: none;">
                                    Tanggal kembali harus tepat 7 hari dari tanggal peminjaman
                                </div>
                            </div>

                            <script>
                            document.getElementById('tanggal_pinjam').addEventListener('change', function() {
                                var tanggalPinjam = new Date(this.value);
                                var tanggalKembali = new Date(tanggalPinjam);
                                tanggalKembali.setDate(tanggalKembali.getDate() + 7);
                                
                                var formattedDate = tanggalKembali.toISOString().split('T')[0];
                                document.getElementById('tanggal_kembali').value = formattedDate;
                            });

                            window.onload = function() {
                                var tanggalPinjam = new Date(document.getElementById('tanggal_pinjam').value);
                                var tanggalKembali = new Date(tanggalPinjam);
                                tanggalKembali.setDate(tanggalKembali.getDate() + 7);
                                
                                var formattedDate = tanggalKembali.toISOString().split('T')[0];
                                document.getElementById('tanggal_kembali').value = formattedDate;
                            }

                            document.querySelector('form').addEventListener('submit', function(e) {
                                var tanggalPinjam = new Date(document.getElementById('tanggal_pinjam').value);
                                var tanggalKembali = new Date(document.getElementById('tanggal_kembali').value);
                                
                                var diffTime = Math.abs(tanggalKembali - tanggalPinjam);
                                var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                                
                                if (diffDays !== 7) {
                                    e.preventDefault();
                                    document.getElementById('dateWarning').style.display = 'block';
                                }
                            });
                            </script>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('peminjaman.index') }}" class="btn btn-default">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
