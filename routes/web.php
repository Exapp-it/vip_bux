<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;



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
