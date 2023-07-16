<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterBoatController;

Route::get('/', function () {
    return redirect()->route('login');
});

// Route::middleware('guest')->group(function () {
Auth::routes();
// });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::controller(RegisterBoatController::class)->prefix('reg-boat')->group(function () {
        Route::get('/', 'index')->name('reg-boat.index');
        Route::get('create', 'create')->name('reg-boat.create');
        Route::get('process', 'process_registration')->name('reg-boat.process');
        Route::get('mfr-form', 'mfr_form')->name('reg-boat.mfr-form');
        Route::get('ads-form', 'adss_form')->name('reg-boat.ads-form');
    });
});
