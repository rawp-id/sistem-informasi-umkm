<?php

use App\Http\Controllers\JenisUsahaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\UmkmController;

Route::get('/', function () {
    return view('layouts.app');
});

Route::resource('jenis-usaha', JenisUsahaController::class);
Route::resource('umkm', UmkmController::class);
