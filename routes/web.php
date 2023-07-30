<?php

use App\Http\Controllers\AnnouncementsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterBoatController;
use App\Http\Controllers\RegisteredBoatController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

    Route::controller(RegisteredBoatController::class)->prefix('reged-boat')->group(function () {
        Route::get('/', 'index')->name('reged-boat.index');
    });

    Route::controller(AnnouncementsController::class)->prefix('announcements')->group(function () {
        Route::get('/', 'index')->name('announcements.index');
        Route::get('create', 'create')->name('announcements.create');
        Route::post('store', 'store')->name('announcements.store');
        Route::get('edit/{announcement}', 'edit')->name('announcements.edit');
        Route::put('update/{announcement}', 'update')->name('announcements.update');
        Route::delete('destroy/{announcement}', 'destroy')->name('announcements.destroy');
    });
});
