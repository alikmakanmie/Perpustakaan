<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    /**
     * 
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'buku_id' => 'required|exists:buku,id',
            'komentar' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5'
        ]);

        try {
            Komentar::create([
                'user_id' => auth()->id(),
                'buku_id' => $request->buku_id,
                'komentar' => $request->komentar,
                'rating' => $request->rating
            ]);

            return back()->with('success', 'Komentar berhasil ditambahkan');
            
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menambahkan komentar');
        }
    }
}
