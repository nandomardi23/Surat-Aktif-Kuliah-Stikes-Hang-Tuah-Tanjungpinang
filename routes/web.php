<?php

use App\Http\Controllers\ExportSuratController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\PejabatController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\FormSuratContoller;
use App\Http\Controllers\frontend\LandingPageController;
use App\Http\Controllers\IsiSuratController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\UserController;



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.dashboard.index');
    });
    Route::resource('/semester', SemesterController::class);
    Route::resource('/programstudi', ProdiController::class);
    Route::resource('/setting', SettingController::class);
    Route::resource('/pejabat', PejabatController::class);
    Route::resource('/surat', SuratController::class);
    Route::get('/surat/{surat}/export', [ExportSuratController::class, 'exportSurat'])->name('surat.export');
    Route::resource('/user', UserController::class);
    Route::post('/user/reset-password/{user}', [UserController::class, 'resetPassword'])->name('user.reset-password');
});


Route::middleware('guest')->group(function () {
    Route::get('/', [LandingPageController::class, 'index'])->name('frontend.index');
    Route::post('/', [LandingPageController::class, 'store'])->name('frontend.store');
    Route::get('/data', [LandingPageController::class, 'getData'])->name('surat.data');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
