<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PesertaBpjsController;
use App\Http\Controllers\TagihanController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    
    // Halaman yang bisa dilihat Karyawan (Role 2) dan Admin/Bos (Role 1)
    Route::get('/peserta', [PesertaBpjsController::class, 'index'])->name('peserta.index');
    Route::get('/tagihan', [TagihanController::class, 'index'])->name('tagihan.index');

    // Halaman KHUSUS ADMIN / BOS (Hanya Role 1 yang boleh tambah/simpan data)
    Route::middleware(['role:1'])->group(function () {
        Route::get('/peserta/create', [PesertaBpjsController::class, 'create'])->name('peserta.create');
        Route::post('/peserta', [PesertaBpjsController::class, 'store'])->name('peserta.store');
        
        Route::get('/tagihan/create', [TagihanController::class, 'create'])->name('tagihan.create');
        Route::post('/tagihan', [TagihanController::class, 'store'])->name('tagihan.store');
    });
});