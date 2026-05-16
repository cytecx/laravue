<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']);
Route::get('/hello', [IndexController::class, 'show'])->middleware('auth');

Route::resource('listing', ListingController::class)->only('index', 'show');

Route::get('login', [AuthController::class, 'create'])->name('login');
Route::post('login', [AuthController::class, 'store'])->name('login.store');
Route::delete('logout', [AuthController::class, 'destroy'])->name('logout');

Route::resource('user-account', UserAccountController::class)->only(['create', 'store']);

// Route::group(['prefix' => 'realtor', 'as' => 'realtor.'], function () {
//     Route::resource('/', RealtorController::class);
// });

Route::prefix('realtor')->name('realtor.')->middleware('auth')->group(function () {
    Route::resource('listing', RealtorController::class)->except(['show'])->withTrashed();
    Route::name('listing.restore')->put('listing/{listing}/restore', [RealtorController::class, 'restore'])->withTrashed();
});
