<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PengembalianController extends Controller
{
    public function index()
    {
        $pengembalian = Pengembalian::with(['peminjaman.user', 'peminjaman.buku'])->get();
        return view('pengembalian.index', compact('pengembalian'));
    }

    public function create()
    {
        $peminjaman = Peminjaman::where('status', 'pinjam')->with('user', 'buku')->get();
        return view('pengembalian.create', compact('peminjaman'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'peminjaman_id' => 'required|exists:peminjaman,id',
            'tanggal_pengembalian' => 'required|date'
        ]);

        $peminjaman = Peminjaman::find($request->peminjaman_id);
        $tanggalKembali = Carbon::parse($peminjaman->tanggal_kembali);
        $tanggalPengembalian = Carbon::parse($request->tanggal_pengembalian);

        $selisihHari = $tanggalPengembalian->diffInDays($tanggalKembali, false);
        $denda = 0;

        if ($tanggalPengembalian > $tanggalKembali) {
            $selisihHari = $tanggalPengembalian->diffInDays($tanggalKembali);
            $denda = $selisihHari * 1000; 
            $statusPeminjaman = 'kembali';
            $statusPengembalian = 'terlambat';
        } else {
            $statusPeminjaman = 'kembali';
            $statusPengembalian = 'tepat_waktu';
        }

        $peminjaman->update(['status' => $statusPeminjaman]);

        Pengembalian::create([
            'peminjaman_id' => $request->peminjaman_id,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'denda' => $denda,
            'status' => $statusPengembalian
        ]);

        return redirect()->route('pengembalian.index')->with('success', 'Data pengembalian berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $pengembalian = Pengembalian::findOrFail($id);
        $peminjaman = $pengembalian->peminjaman;
        
        $pengembalian->delete();
        $peminjaman->delete();

        return redirect()->route('pengembalian.index')->with('success', 'Data pengembalian berhasil dihapus');
    }
}
