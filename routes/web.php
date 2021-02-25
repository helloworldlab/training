<?php

use App\Http\Controllers\LogMasukController;
use App\Http\Controllers\PenggunaController;
use Illuminate\Support\Facades\Route;

// Route halaman utama
Route::get('/', function () {
    return view('laman-utama');
});

// Route halaman log masuk
Route::get('log-masuk', [LogMasukController::class, 'lamanLogMasuk'])->name('laman-log-masuk');

// Route tindakan log masuk
Route::post('log-masuk', [LogMasukController::class, 'logMasuk'])->name('log-masuk');

// Route memaparkan halaman senarai pengguna
// Route memaparkan halaman cipta pengguna baru
// Route tindakan simpanan pengguna baru
// Route memaparkan halaman butiran pengguna
// Route memaparkan halaman kemaskini butiran pengguna
// Route tindakan kemaskini butiran pengguna
// Route tindakan hapus butiran pengguna

Route::resource('pengguna', PenggunaController::class);