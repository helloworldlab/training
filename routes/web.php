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
Route::get('pengguna', [PenggunaController::class, 'index']);

// GET localhost:8000/pengguna/create
Route::get('pengguna/create', [PenggunaController::class, 'create']);

// POST localhost:8000/pengguna
Route::post('pengguna', [PenggunaController::class, 'store']);