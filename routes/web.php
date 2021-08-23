<?php

use App\Http\Controllers\PenggunaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('hubungi-kami', function () {
    return view('hubungi-kami');
});

// GET localhost:8000/pengguna
Route::get('pengguna', [PenggunaController::class, 'index']);

// GET localhost:8000/pengguna/baru
Route::get('pengguna/baru', [PenggunaController::class, 'create']);

// POST localhost:8000/pengguna
Route::post('pengguna', [PenggunaController::class, 'store']);
