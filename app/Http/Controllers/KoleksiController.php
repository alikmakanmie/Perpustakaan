<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\KoleksiPribadi;
use Illuminate\Http\Request;

class KoleksiController extends Controller
{
    public function index()
    {
        $koleksi = KoleksiPribadi::all();
        return view('koleksi.index', compact('koleksi'));
    }

    public function create()
    {
        $buku = Buku::all();
        return view('koleksi.create', compact('buku'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'buku_id' => 'required',
            'user_id' => 'required'
        ]);

        $koleksi = KoleksiPribadi::create([
            'buku_id' => $request->buku_id,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('koleksi.index')
            ->with('success', 'Buku berhasil ditambahkan ke koleksi');
    }

    public function edit($id)
    {
        $koleksi = KoleksiPribadi::findOrFail($id);
        return view('koleksi.edit', compact('koleksi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'buku_id' => 'required',
            'user_id' => 'required'
        ]);

        $koleksi = KoleksiPribadi::findOrFail($id);
        $koleksi->update([
            'buku_id' => $request->buku_id,
            'user_id' => $request->user_id
        ]);

        return redirect()->route('koleksi.index')
            ->with('success', 'Data buku berhasil diperbarui');
    }

    public function destroy($id)
    {
        $koleksi = KoleksiPribadi::findOrFail($id);
        $koleksi->delete();

        return redirect()->route('koleksi.index')
            ->with('success', 'Buku berhasil dihapus dari koleksi');
    }
}
