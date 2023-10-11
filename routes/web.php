<?php

use App\Http\Controllers\AnnouncementsController;
use App\Http\Controllers\OwnerInfoController;
use App\Http\Controllers\RegisterBoatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalkInController;
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
        Route::put('profilePassword/{id}', 'passwordUpdate')->name('users.passwordUpdate');
    });

    Route::controller(RegisterBoatController::class)->prefix('reg-boat')->group(function () {
        Route::get('/', 'index')->name('reg-boat.index');
        Route::get('/reg-boat', 'create')->name('reg-boat.create');
        Route::post('/storeBoat', 'regBoat')->name('reg-boat.store');
        Route::get('/pendingBoats', 'pendingRegBoats')->name('reg-boat.pending');
        Route::get('/edit/{id}', 'edit')->name('reg-boat.edit');
        Route::put('/update/{id}', 'update')->name('reg-boat.update');
        Route::get('/show/{id}', 'show')->name('reg-boat.show');
        Route::delete('destroy/{id}', 'destroy')->name('reg-boat.destroy');

        Route::middleware(['role:admin|staff'])->group(function () {
            Route::get('/approve/{id}', 'approve')->name('reg-boat.approve');
            Route::get('/disapprove/{id}', 'disapprove')->name('reg-boat.disapprove');
            Route::get('/view/{id}', 'view')->name('reg-boat.view');
            Route::get('/archivedBoats', 'archived')->name('reg-boat.archived');
        });
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

        Route::middleware(['role:admin|staff'])->group(function () {
            Route::get('/registeredOwners', 'regOwners')->name('owner-info.registered-owners');
            // Route::get('/pendingOwners', 'pendingOwners')->name('owner-info.pending-owners');
            // Route::get('/approve/{id}', 'approve')->name('owner-info.approve');
            Route::get('/archive/[id}', 'archive')->name('owner-info.archive');
        });
    });

    Route::controller(WalkInController::class)->prefix('walk-in')->group(function () {
        Route::get('/' , 'index')->name('walk-in.index');
        Route::get('/create/{id?}', 'create')->name('walk-in.create');
        Route::get('/walk-in-owner-edit{id}', 'create')->name('walkin-owner.edit');
        Route::post('/store', 'store')->name('walk-in.store');
        Route::get('/walkin-livelihood', 'walkInLivelihood')->name('walk-in.livelihood');
        Route::post('/walkin-livelihood-store', 'walkInLivelihoodStore')->name('walk-in.livelihoodStore');
        Route::get('/walkin-adss-form', 'walkInAdss')->name('walk-in.adss');
        Route::post('/walkin-adss-store', 'walkInAdssStore')->name('walk-in.adssStore');
    })->middleware('role:admin|staff');
});
