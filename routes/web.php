<?php

use App\Http\Controllers\ProdiController;
use App\Http\Controllers\SemesterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});


Route::get('/dashboard', function () {
    return view('pages.dashboard.index');
});

Route::resource('/semester', SemesterController::class);
Route::resource('/programstudi', ProdiController::class);
