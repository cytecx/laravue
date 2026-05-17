<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [IndexController::class, 'index'])->name('home');
Route::resource('listing', ListingController::class)->only('index', 'show');

// Guest routes
Route::get('login', [AuthController::class, 'create'])->name('login');
Route::post('login', [AuthController::class, 'store'])->name('login.store');
Route::delete('logout', [AuthController::class, 'destroy'])->name('logout');

Route::resource('user-account', UserAccountController::class)->only(['create', 'store']);

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/hello', [IndexController::class, 'show']);
    Route::resource('listing.offer', ListingOfferController::class)->only(['store']);

    Route::get('email/verify', function () {
        return Inertia('Auth/VerifyEmail');
    })->name('verification.notice');

    Route::get('email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect()->route('home')->with('success', 'Your email has been verified successfully.');
    })->middleware('signed')->name('verification.verify');

    Route::post('email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('success', 'Verification link sent!');
    })->middleware('throttle:6,1')->name('verification.send');

    Route::resource('notification', NotificationController::class)->only(['index']);
    Route::put('notification/{notification}/seen', NotificationSeenController::class)->name('notification.seen');
});

// Realtor routes
Route::prefix('realtor')->name('realtor.')->middleware(['auth', 'verified'])->group(function () {
    Route::resource('listing', RealtorListingController::class)->withTrashed();
    Route::name('listing.restore')->put('listing/{listing}/restore', [RealtorListingController::class, 'restore'])->withTrashed();
    Route::resource('listing.image', RealtorListingImageController::class)->only(['create', 'store', 'destroy']);
    Route::name('offer.accept')->put('offer/{offer}/accept', RealtorListingAcceptOfferController::class);
});
