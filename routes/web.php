<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\InformasiAdatController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\StrukturController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Halaman Publik (tanpa login)
|--------------------------------------------------------------------------
*/
Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');

Route::get('/informasi-adat', [InformasiAdatController::class, 'index'])->name('informasi.index');
Route::get('/informasi-adat/{informasiAdat}', [InformasiAdatController::class, 'show'])->name('informasi.show');

Route::get('/struktur-organisasi', [StrukturController::class, 'index'])->name('struktur');

Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');
Route::get('/kegiatan/{kegiatanAdat}', [KegiatanController::class, 'show'])->name('kegiatan.show');

Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');

/*
|--------------------------------------------------------------------------
| Komentar (publik, via AJAX/Form)
|--------------------------------------------------------------------------
*/
Route::post('/komentar', [\App\Http\Controllers\KomentarController::class, 'store'])->name('komentar.store');

/*
|--------------------------------------------------------------------------
| Google Login (Public User)
|--------------------------------------------------------------------------
*/
Route::get('/auth/google', [\App\Http\Controllers\Auth\GoogleLoginController::class, 'redirect'])->name('google.login');
Route::get('/auth/google/callback', [\App\Http\Controllers\Auth\GoogleLoginController::class, 'callback'])->name('google.callback');
Route::post('/logout-pengguna', [\App\Http\Controllers\Auth\GoogleLoginController::class, 'logout'])->name('pengguna.logout');

/*
|--------------------------------------------------------------------------
| Like Komentar (AJAX, wajib login)
|--------------------------------------------------------------------------
*/
Route::post('/like/{komentar}', [\App\Http\Controllers\LikeController::class, 'toggle'])->name('komentar.like');

/*
|--------------------------------------------------------------------------
| Autentikasi Admin
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [LoginController::class, 'showLogin'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.proses');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

/*
|--------------------------------------------------------------------------
| Panel Admin (wajib login)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('profil', \App\Http\Controllers\Admin\ProfilDesaController::class)
        ->parameters(['profil' => 'profil'])
        ->only(['index', 'edit', 'update']);

    Route::resource('informasi', \App\Http\Controllers\Admin\InformasiAdatController::class)
        ->parameters(['informasi' => 'informasi'])
        ->except('show');

    Route::resource('pengurus', \App\Http\Controllers\Admin\PengurusController::class)
        ->parameters(['pengurus' => 'penguru'])
        ->except('show');

    Route::resource('kegiatan', \App\Http\Controllers\Admin\KegiatanController::class)
        ->parameters(['kegiatan' => 'kegiatan'])
        ->except('show');

    Route::resource('galeri', \App\Http\Controllers\Admin\GaleriController::class)
        ->parameters(['galeri' => 'galeri'])
        ->except('show');

    // Kelola Komentar
    Route::get('komentar', [\App\Http\Controllers\Admin\KomentarController::class, 'index'])->name('komentar.index');
    Route::patch('komentar/{komentar}/setujui', [\App\Http\Controllers\Admin\KomentarController::class, 'setujui'])->name('komentar.setujui');
    Route::patch('komentar/{komentar}/tolak', [\App\Http\Controllers\Admin\KomentarController::class, 'tolak'])->name('komentar.tolak');
    Route::delete('komentar/{komentar}', [\App\Http\Controllers\Admin\KomentarController::class, 'hapus'])->name('komentar.hapus');

    // Kelola Notifikasi
    Route::get('notifikasi', [\App\Http\Controllers\Admin\NotifikasiController::class, 'index'])->name('notifikasi.index');
    Route::get('notifikasi/{notifikasi}/baca', [\App\Http\Controllers\Admin\NotifikasiController::class, 'baca'])->name('notifikasi.baca');
    Route::patch('notifikasi/baca-semua', [\App\Http\Controllers\Admin\NotifikasiController::class, 'bacaSemua'])->name('notifikasi.bacaSemua');
    Route::delete('notifikasi/{notifikasi}', [\App\Http\Controllers\Admin\NotifikasiController::class, 'hapus'])->name('notifikasi.hapus');
});
