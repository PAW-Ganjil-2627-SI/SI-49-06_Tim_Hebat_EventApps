<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\AuthController;

// Halaman login untuk pengguna yang belum login.
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login']);
});

// Semua halaman berikut wajib login.
Route::middleware('auth')->group(function () {
    Route::redirect('/', '/peserta');

    // Admin dan Petugas: lihat, tambah, dan ubah.
    // Tidak mendaftarkan destroy dan show.
    Route::resource('peserta', PesertaController::class)
        ->except(['destroy', 'show'])
        ->middleware('role:admin,petugas');

    // Hanya Admin yang boleh menghapus.
    Route::delete('/peserta/{peserta}', [
        PesertaController::class,
        'destroy',
    ])
        ->middleware('role:admin')
        ->name('peserta.destroy');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});