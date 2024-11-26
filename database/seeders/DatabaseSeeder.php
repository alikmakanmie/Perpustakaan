<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => Hash::make('password'),
            'nama_lengkap' => 'Administrator',
            'alamat' => 'Jl. Admin No. 1',
        ]);

        \App\Models\User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'role' => 'user',
            'password' => Hash::make('password'),
            'nama_lengkap' => 'User',
        ]);

        \App\Models\User::create([
            'name' => 'Petugas',
            'email' => 'petugas@example.com',
            'role' => 'petugas',
            'password' => Hash::make('password'),
            'nama_lengkap' => 'Petugas',
            'alamat' => 'Jl. Petugas No. 1',
        ]);


    }
}
