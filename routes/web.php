<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SawController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\BobotController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\JenisUsahaController;

Route::get('/', function () {
    return view('layouts.app');
});

Route::resource('jenis-usaha', JenisUsahaController::class);
Route::resource('umkm', UmkmController::class);
Route::resource('bobot', BobotController::class);
Route::resource('kriteria', KriteriaController::class);
Route::get('/saw', [SawController::class, 'index'])->name('saw.index');



