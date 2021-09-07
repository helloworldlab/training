<?php

use App\Http\Controllers\PenggunaController;
use Illuminate\Support\Facades\Route;

// GET localhost:8000
Route::get('/', function () {
    return view('welcome');
});

// GET localhost:8000/hubungi-kami
Route::get('hubungi-kami', function () {
    return view('hubungi-kami');
});

// GET localhost:8000/pengguna
Route::get('pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');

// GET localhost:8000/pengguna/create
Route::get('pengguna/create', [PenggunaController::class, 'create'])->name('pengguna.create');

// POST localhost:8000/pengguna
Route::post('pengguna', [PenggunaController::class, 'store'])->name('pengguna.store');

// GET localhost:8000/pengguna/{id_pengguna}
Route::get('pengguna/{pengguna}', [PenggunaController::class, 'show'])->name('pengguna.show');

// GET localhost:8000/pengguna/{id_pengguna}/edit
Route::get('pengguna/{pengguna}/edit', [PenggunaController::class, 'edit'])->name('pengguna.edit');

// PUT localhost:8000/pengguna/{id_pengguna}
Route::put('pengguna/{pengguna}', [PenggunaController::class, 'update'])->name('pengguna.update');

// DELETE localhost:8000/pengguna/{id_pengguna}
Route::delete('pengguna/{pengguna}', [PenggunaController::class, 'destroy'])->name('pengguna.destroy');
