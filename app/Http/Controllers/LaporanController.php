<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function peminjaman(Request $request)
    {
        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;
        
        $query = Peminjaman::with(['user', 'buku']);
        
        if ($tanggal_awal && $tanggal_akhir) {
            $query->whereBetween('tanggal_pinjam', [$tanggal_awal, $tanggal_akhir]);
        }
        
        $peminjaman = $query->get();
        
        if ($request->type === 'pdf') {
            $pdf = PDF::loadView('laporan.peminjaman-pdf', compact('peminjaman', 'tanggal_awal', 'tanggal_akhir'));
            return $pdf->download('laporan-peminjaman.pdf');
        }
        
        return view('laporan.peminjaman', compact('peminjaman', 'tanggal_awal', 'tanggal_akhir'));
    }

    public function pengembalian(Request $request)
    {
        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;
        
        $query = Pengembalian::with(['peminjaman.user', 'peminjaman.buku']);
        
        if ($tanggal_awal && $tanggal_akhir) {
            $query->whereBetween('tanggal_pengembalian', [$tanggal_awal, $tanggal_akhir]);
        }
        
        $pengembalian = $query->get();
        
        if ($request->type === 'pdf') {
            $pdf = PDF::loadView('laporan.pengembalian-pdf', compact('pengembalian', 'tanggal_awal', 'tanggal_akhir'));
            return $pdf->download('laporan-pengembalian.pdf');
        }
        
        return view('laporan.pengembalian', compact('pengembalian', 'tanggal_awal', 'tanggal_akhir'));
    }
}