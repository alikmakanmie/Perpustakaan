<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kategoribuku_relasi', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('kategori_id')->constrained('kategoribuku');
            $table->foreignId('buku_id')->constrained('buku');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategoribuku_relasi');
    }
};