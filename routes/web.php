<?php

use App\Http\Controllers\IsiSuratController;
use App\Http\Controllers\PejabatController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});


Route::get('/dashboard', function () {
    return view('pages.dashboard.index');
});

Route::resource('/semester', SemesterController::class);
Route::resource('/programstudi', ProdiController::class);
Route::resource('/setting', SettingController::class);
Route::resource('/pejabat', PejabatController::class);
route::resource('/isi_surat', IsiSuratController::class);


Route::get('/mahasiswa', function () {
    return view('frontend.layouts.app');
});
