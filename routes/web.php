<?php

use Illuminate\Support\Facades\Route;

// Anonymous function atau Closure
Route::get('/', function () {
    return view('laman-utama');
});