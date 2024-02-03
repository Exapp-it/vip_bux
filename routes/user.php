<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\MainController;
use App\Http\Controllers\User\ProfileController;

Route::middleware(['auth', 'verified', 'auth.verify'])->group(function () {
  Route::get('', [MainController::class, 'index'])
    ->name('user.index');

  Route::prefix('profile')->group(function () {
    Route::get('', [ProfileController::class, 'index'])
      ->name('user.profile');

    Route::get('edit', [ProfileController::class, 'edit'])
      ->name('user.profile.edit');

    Route::put('personal/update/{user}', [ProfileController::class, 'updatePersonal'])
      ->name('user.profile.update.personal');

    Route::put('contact/update/{user}', [ProfileController::class, 'updateContact'])
      ->name('user.profile.update.contact');

    Route::put('password/update/{user}', [ProfileController::class, 'updatePassword'])
      ->name('user.profile.update.password');

    Route::put('code/update/{user}', [ProfileController::class, 'updateCode'])
      ->name('user.profile.update.code');

    Route::post('upload/avatar/{user}', [ProfileController::class, 'uploadAvatar'])
      ->name('user.profile.upload.avatar');

  });
});
