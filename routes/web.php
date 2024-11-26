<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\KoleksiController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/user', 'user')->name('user');
    Route::get('/showmore', 'show')->name('show.more');
    Route::get('/showdetail/{id}', 'showdetail')->name('showdetail');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/register', 'showRegistrationForm')->name('register');
    Route::post('/register', 'register')->name('register');
});

Route::controller(BukuController::class)->group(function () {
    Route::get('/buku', 'index')->name('buku.index');
    Route::get('/buku/create', 'create')->name('buku.create');
    Route::post('/buku', 'store')->name('buku.store');
    Route::get('/buku/{buku}/edit', 'edit')->name('buku.edit');
    Route::put('/buku/{buku}', 'update')->name('buku.update');
    Route::delete('/buku/{buku}', 'destroy')->name('buku.destroy');
});

Route::controller(PeminjamanController::class)->group(function () {
    Route::get('/peminjaman', 'index')->name('peminjaman.index');
    Route::get('/peminjaman/create', 'create')->name('peminjaman.create');
    Route::post('/peminjaman', 'store')->name('peminjaman.store');
    Route::delete('/peminjaman/{peminjaman}', 'destroy')->name('peminjaman.destroy');
    Route::get('/peminjaman/persetujuan', 'persetujuan')->name('peminjaman.persetujuan');
    Route::put('/peminjaman/{peminjaman}/setujui', 'setujui')->name('peminjaman.setujui');
    Route::put('/peminjaman/{peminjaman}/tolak', 'tolak')->name('peminjaman.tolak');
    Route::get('/peminjaman/user', 'user')->name('peminjaman.user');
    Route::put('/peminjaman/{peminjaman}/update-status', 'updateStatus')->name('peminjaman.updateStatus');
});

Route::controller(KategoriController::class)->group(function () {
    Route::get('/kategori', 'index')->name('kategori.index');
    Route::get('/kategori/create', 'create')->name('kategori.create');
    Route::post('/kategori', 'store')->name('kategori.store');
    Route::get('/kategori/{kategori}/edit', 'edit')->name('kategori.edit');
    Route::put('/kategori/{kategori}', 'update')->name('kategori.update');
    Route::delete('/kategori/{kategori}', 'destroy')->name('kategori.destroy');
});

Route::controller(PengembalianController::class)->group(function () {
    Route::get('/pengembalian', 'index')->name('pengembalian.index');
    Route::get('/pengembalian/create', 'create')->name('pengembalian.create');
    Route::post('/pengembalian', 'store')->name('pengembalian.store');
    Route::delete('/pengembalian/{pengembalian}', 'destroy')->name('pengembalian.destroy');
});

Route::controller(KoleksiController::class)->group(function () {
    Route::get('/koleksi', 'index')->name('koleksi.index');
    Route::get('/koleksi/create', 'create')->name('koleksi.create');
    Route::get('/koleksi/{buku}/edit', 'edit')->name('koleksi.edit');
    Route::post('/koleksi', 'store')->name('koleksi.store');
    Route::put('/koleksi/{buku}', 'update')->name('koleksi.update');
    Route::delete('/koleksi/{buku}', 'destroy')->name('koleksi.destroy');
});


Route::controller(KomentarController::class)->group(function () {
    Route::post('/komentar', 'store')->name('komentar.store');
});

Route::get('/laporan/peminjaman', [LaporanController::class, 'peminjaman'])->name('laporan.peminjaman');
Route::get('/laporan/pengembalian', [LaporanController::class, 'pengembalian'])->name('laporan.pengembalian');



