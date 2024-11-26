<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Komentar;

class FrontendController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        return view('frontend.index', compact('buku'));
    }

    public function dashboard()
    {
        return view('layout.dashboard');
    }

    public function user()
    {
        return view('dashboard.user');
    }

    public function show()
    {
        $buku = Buku::all();
        return view('frontend.show', compact('buku'));
    }

    public function showdetail($id)
    {
        $buku = Buku::find($id);
        $komentar = Komentar::where('buku_id', $id)->with('user')->latest()->get();
        return view('frontend.showdetail', compact('buku', 'komentar'));
    }
}
