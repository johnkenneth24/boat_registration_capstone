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
        Route::middleware(['role:admin'])->group(function () {
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

    // routes admin and staff only can access
    Route::controller(AnnouncementsController::class)->prefix('announcement')->group(function () {
        Route::get('/', 'index')->name('announcement.index');
        Route::get('create', 'create')->name('announcement.create');
        Route::post('store', 'store')->name('announcement.store');
        Route::get('edit/{announcement}', 'edit')->name('announcement.edit');
        Route::put('update/{announcement}', 'update')->name('announcement.update');
        Route::delete('destroy/{announcement}', 'destroy')->name('announcement.destroy');
    })->middleware(['role:admin', 'role:staff']);

    Route::controller(OwnerInfoController::class)->prefix('owner-info')->group(function () {
        Route::get('/', 'index')->name('owner-info.index');
        Route::get('/edit{id}', 'personal')->name('owner-info.edit');
        Route::post('/store', 'store')->name('owner-info.store');
        Route::get('/livelihood', 'livelihood')->name('owner-info.livelihood');
        Route::post('/storelivelihood', 'livelihoodStore')->name('owner-info.livelihoodStore');
    });
});
