<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/hello', [IndexController::class, 'show'])->middleware('auth');

Route::resource('listing', ListingController::class)->only('index', 'show');
Route::resource('listing.offer', ListingOfferController::class)->middleware('auth')->only(['store']);

Route::get('login', [AuthController::class, 'create'])->name('login');
Route::post('login', [AuthController::class, 'store'])->name('login.store');
Route::delete('logout', [AuthController::class, 'destroy'])->name('logout');

Route::resource('user-account', UserAccountController::class)->only(['create', 'store']);

// Route::group(['prefix' => 'realtor', 'as' => 'realtor.'], function () {
//     Route::resource('/', RealtorListingController::class);
// });

Route::prefix('realtor')->name('realtor.')->middleware('auth')->group(function () {
    Route::resource('listing', RealtorListingController::class)->withTrashed();
    Route::name('listing.restore')->put('listing/{listing}/restore', [RealtorListingController::class, 'restore'])->withTrashed();
    Route::resource('listing.image', RealtorListingImageController::class)->only(['create', 'store', 'destroy']);
    Route::name('offer.accept')->put('offer/{offer}/accept', RealtorListingAcceptOfferController::class);
});
