<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::with('kategori')->paginate(10);
        return view('buku.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('buku.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'judul' => 'required',
            'penerbit' => 'required',
            'penulis' => 'required', 
            'tahun_terbit' => 'required',
            'kategori_id' => 'required|exists:kategoribuku,id',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);


        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $nama_gambar = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('images/buku'), $nama_gambar);
            $imagePath = 'images/buku/' . $nama_gambar;
        }

        $buku = Buku::create([
            'judul_buku' => $validateData['judul'],
            'penerbit' => $validateData['penerbit'],
            'penulis' => $validateData['penulis'],
            'tahun_terbit' => $validateData['tahun_terbit'],
            'gambar' => $imagePath
        ]);

        $kategori_ids = is_array($validateData['kategori_id']) 
            ? $validateData['kategori_id'] 
            : [$validateData['kategori_id']];
            
        $buku->kategori()->sync($kategori_ids);

        return redirect()->route('buku.index')
                        ->with('success', 'Buku berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $buku = Buku::findOrFail($id);
        $komentar = $buku->komentar()->with('user')->latest()->get();
        return view('frontend.showdetail', compact('buku', 'komentar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        $kategori = Kategori::all();
        return view('buku.edit', compact('buku', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        $validateData = $request->validate([
            'judul' => 'required',
            'penerbit' => 'required', 
            'penulis' => 'required',
            'tahun_terbit' => 'required',
            'kategori_id' => 'required|exists:kategoribuku,id',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            
            if ($buku->gambar && file_exists(public_path($buku->gambar))) {
                unlink(public_path($buku->gambar));
            }

            $gambar = $request->file('gambar');
            $nama_gambar = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('images/buku'), $nama_gambar);
            $imagePath = 'images/buku/' . $nama_gambar;

            $buku->update([
                'judul_buku' => $validateData['judul'],
                'penerbit' => $validateData['penerbit'],
                'penulis' => $validateData['penulis'], 
                'tahun_terbit' => $validateData['tahun_terbit'],
                'gambar' => $imagePath
            ]);
        } else {
            $buku->update([
                'judul_buku' => $validateData['judul'],
                'penerbit' => $validateData['penerbit'],
                'penulis' => $validateData['penulis'],
                'tahun_terbit' => $validateData['tahun_terbit']
            ]);
        }

        $kategori_ids = is_array($validateData['kategori_id'])
            ? $validateData['kategori_id']
            : [$validateData['kategori_id']];
            
        $buku->kategori()->sync($kategori_ids);

        return redirect()->route('buku.index')
                        ->with('success', 'Buku berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        try {
            
            if ($buku->gambar && file_exists(public_path($buku->gambar))) {
                unlink(public_path($buku->gambar));
            }
            
            $buku->delete();
            return redirect()->route('buku.index')
                            ->with('success', 'Buku berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('buku.index')
                                ->with('error', 'Gagal menghapus buku. Buku mungkin sedang dipinjam.');
            }
        }
    

}
