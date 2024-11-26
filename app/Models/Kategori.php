<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategoribuku';
    protected $fillable = ['nama_kategori'];

    public function buku()
    {
        return $this->belongsToMany(Buku::class, 'kategoribuku_relasi', 'kategori_id', 'buku_id');
    }
}
