<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\MainController;


Route::middleware('auth')->group(function () {
  Route::get('', [MainController::class, 'index'])->name('user.index');
});
