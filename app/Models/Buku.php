<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';
    protected $fillable = ['judul_buku', 'penulis', 'penerbit', 'tahun_terbit', 'gambar'];

    public function kategori()
    {
        return $this->belongsToMany(Kategori::class, 'kategoribuku_relasi', 'buku_id', 'kategori_id');
    }

    public function komentar()
    {
        return $this->hasMany(Komentar::class);
    }

    public function koleksiPribadi()
    {
        return $this->hasMany(KoleksiPribadi::class);
    }
}
