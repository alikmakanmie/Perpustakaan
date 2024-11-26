<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategorirelasi extends Model
{
    use HasFactory;

    protected $table = 'kategorirelasi';
    protected $guarded = ['id'];
    public $timestamps = true;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
}
