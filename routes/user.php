<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\MainController;
use App\Http\Controllers\User\ProfileController;

Route::middleware(['auth', 'verified'])->group(function () {
  Route::get('', [MainController::class, 'index'])->name('user.index');
  Route::get('profile', [ProfileController::class, 'index'])->name('user.profile');
});
