<?php

use App\Http\Controllers\AnnouncementsController;
use App\Http\Controllers\OwnerInfoController;
use App\Http\Controllers\RegisterBoatController;
use App\Http\Controllers\RegisteredBoatController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// on open of site
Route::redirect('/', '/login');

// Laravel authentication routes
Auth::routes();

// Routes protected by the 'auth' middleware
Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::controller(UserController::class)->prefix('users')->group(function () {

        // routes admin only can access
        Route::middleware('role:admin')->group(function () {
            Route::get('index', 'index')->name('users.index');
            Route::get('create', 'create')->name('users.create');
            Route::post('store', 'store')->name('users.store');
            Route::get('edit/{id}', 'edit')->name('users.edit');
            Route::get('show/{id}', 'show')->name('users.show');
            Route::put('update/{id}', 'update')->name('users.update');
            Route::delete('destroy/{id}', 'destroy')->name('users.destroy');
        });

        Route::get('profile', 'profile')->name('users.profile');
        Route::put('profile/{id}', 'profileUpdate')->name('users.profileUpdate');
    });

    // only admin and staff can access these routes
    Route::controller(AnnouncementsController::class)->middleware(['role:admin', 'role:staff'])->prefix('announcement')->group(function () {
        Route::get('/', 'index')->name('announcement.index');
        Route::get('create', 'create')->name('announcement.create');
        Route::post('store', 'store')->name('announcement.store');
        Route::get('edit/{announcement}', 'edit')->name('announcement.edit');
        Route::put('update/{announcement}', 'update')->name('announcement.update');
        Route::delete('destroy/{announcement}', 'destroy')->name('announcement.destroy');
    });

    Route::controller(OwnerInfoController::class)->prefix('owner-info')->group(function () {
        Route::get('/', 'index')->name('owner-info.index');
        Route::get('create', 'create')->name('owner-info.create');
        Route::post('store', 'store')->name('owner-info.store');
        Route::get('edit/{id}', 'edit')->name('owner-info.edit');
        Route::put('update/{id}', 'update')->name('owner-info.update');
        Route::delete('destroy/{id}', 'destroy')->name('owner-info.destroy');
    });

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

});
