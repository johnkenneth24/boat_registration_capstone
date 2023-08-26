<?php

use App\Http\Controllers\AnnouncementsController;
use App\Http\Controllers\ApplicantListController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterBoatController;
use App\Http\Controllers\RegisteredBoatController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

// Laravel authentication routes
Auth::routes();

// Routes protected by the 'auth' middleware
Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::view('about', 'about')->name('about');
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::controller(RegisterBoatController::class)->prefix('reg-boat')->group(function () {
        Route::get('/', 'index')->name('reg-boat.index');
        Route::get('/createForm1', 'createForm1')->name('form1.create');
        Route::post('/storeForm1', 'storeForm1')->name('form1.store');
        Route::get('/createForm2', 'createForm2')->name('form2.create');
        Route::post('/storeForm2', 'storeForm2')->name('form2.store');
        Route::get('/confirmForm', 'confirmForm')->name('form.confirm');
        // Route::post('/storeForm3', 'storeForm3')->name('reg-boat3.store');
        Route::get('/sample', 'sample')->name('reg-boat.sample');

        Route::get('/process', 'process_registration')->name('reg-boat.process');
        Route::get('mfr-form', 'mfr_form')->name('reg-boat.mfr-form');
        Route::get('ads-form', 'adss_form')->name('reg-boat.ads-form');
    });

    Route::controller(RegisteredBoatController::class)->prefix('reged-boat')->group(function () {
        Route::get('/', 'index')->name('reged-boat.index');
    });

    Route::controller(ApplicantListController::class)->prefix('applist')->group(function () {
        Route::get('/', 'index')->name('applist.index');
        Route::get('process', 'process_registration')->name('applist.process');
        Route::get('mfr-form', 'mfr_form')->name('applist.mfr-form');
        Route::get('ads-form', 'adss_form')->name('applist.ads-form');
    });

    Route::controller(AnnouncementsController::class)->prefix('announcement')->group(function () {
        Route::get('/', 'index')->name('announcement.index');
        Route::get('create', 'create')->name('announcement.create');
        Route::post('store', 'store')->name('announcement.store');
        Route::get('edit/{announcement}', 'edit')->name('announcement.edit');
        Route::put('update/{announcement}', 'update')->name('announcement.update');
        Route::delete('destroy/{announcement}', 'destroy')->name('announcement.destroy');
    });

});
