<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with(['user', 'buku'])->get();
        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        $buku = Buku::all();
        return view('peminjaman.create', compact('buku'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'buku_id' => 'required',
            'tanggal_pinjam' => 'required|date|after_or_equal:today',
            'tanggal_kembali' => 'required|date|after:tanggal_pinjam'
        ]);

        
        $tanggalPinjam = \Carbon\Carbon::parse($request->tanggal_pinjam);
        $tanggalKembali = \Carbon\Carbon::parse($request->tanggal_kembali);
        $selisihHari = $tanggalPinjam->diffInDays($tanggalKembali);

        if ($selisihHari > 7) {
            return redirect()->back()->with('error', 'Tanggal kembali tidak boleh lebih dari 7 hari dari tanggal pinjam');
        }

        Peminjaman::create([
            'user_id' => Auth::id(),
            'buku_id' => $request->buku_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => 'pending'
        ]);

        return redirect()->route('peminjaman.index')
                        ->with('success', 'Peminjaman berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $buku = Buku::all();
        return view('peminjaman.edit', compact('peminjaman', 'buku'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'buku_id' => 'required',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after:tanggal_pinjam',
            'status' => 'required|in:pinjam,kembali'
        ]);

        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update([
            'buku_id' => $request->buku_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => $request->status
        ]);

        return redirect()->route('peminjaman.index')
                        ->with('success', 'Peminjaman berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

        return redirect()->route('peminjaman.index')
                        ->with('success', 'Peminjaman berhasil dihapus.');
    }

    public function persetujuan()
    {
        $peminjaman = Peminjaman::where('status', 'pending')->get();
        return view('peminjaman.persetujuan', compact('peminjaman'));
    }

    public function setujui(Peminjaman $peminjaman)
    {
        $peminjaman->update(['status' => 'pinjam']);
        return redirect()->back()->with('success', 'Peminjaman berhasil disetujui');
    }

    public function tolak(Peminjaman $peminjaman)
    {
        $peminjaman->update(['status' => 'ditolak']);
        return redirect()->back()->with('success', 'Peminjaman berhasil ditolak');
    }

    public function user()
    {
        $peminjaman = Peminjaman::all();
        return view('peminjaman.user', compact('peminjaman'));
    }

    public function updateStatus(Peminjaman $peminjaman)
    {
        if (!in_array(auth()->user()->role, ['admin', 'petugas'])) {
            return back()->with('error', 'Tidak memiliki akses');
        }


        if ($peminjaman->status !== 'disetujui') {
            return back()->with('error', 'Status peminjaman tidak valid');
        }

        $peminjaman->update([
            'status' => 'dipinjam'
        ]);

        $peminjaman->buku->update([
            'status' => 'dipinjam'
        ]);

        return back()->with('success', 'Status peminjaman berhasil diupdate');
    }
}
