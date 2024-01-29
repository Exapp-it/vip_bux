<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;



Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('about', [HomeController::class, 'about'])->name('home.about');

//Auth
Route::middleware('guest')->group(function () {
  Route::post('register', [RegisterController::class, 'store'])->name('register.store');
  Route::post('login', [LoginController::class, 'store'])->name('login.store');
});

Route::middleware('auth')->group(function () {
  Route::delete('user/logout', [LoginController::class, 'logout'])->name('user.logout');


});


//Email verify

Route::get('/email/verify', function () {
  return inertia('User/verify-email');
})->middleware('auth')->name('verification.notice');

Route::post('/email/verification-notification', function () {
  Auth::user()->sendEmailVerificationNotification();
  return back()->with(['message' => 'Verification link sent!', 'status' => 'success']);
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
  $request->fulfill();

  return redirect()->route('user.index');
})->middleware(['auth', 'signed'])->name('verification.verify');
