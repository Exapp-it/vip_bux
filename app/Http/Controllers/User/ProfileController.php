<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Image;
use App\Enums\UserGender;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Enums\UserOccupation;
use App\Services\File\FileService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
  public function index()
  {
    return Inertia::render('User/profile', [
      'title' => "Профиль пользователя",
    ]);
  }

  public function edit()
  {
    return Inertia::render('User/profileEdit', [
      'title' => "Редактирование профиля",
      'genders' => UserGender::readable(),
      'occupations' => UserOccupation::readable(),
    ]);
  }


  public function updatePersonal(Request $request, User $user)
  {
    try {
      $validated = $request->validate([
        'name' => ['sometimes', 'nullable', 'string', 'max:255', 'alpha'],
        'lastname' => ['sometimes', 'nullable', 'string', 'max:255'],
        'birthday' => ['nullable', 'date'],
        'gender' => ['nullable', 'in:' . UserGender::toString()],
        'occupation' => ['nullable', 'in:' . UserOccupation::toString()],
      ]);
    } catch (\Exception $error) {
      return Redirect::back()->withErrors([
        'message' => $error->getMessage(),
        'status' => 'error',
      ]);
    }


    $user->profile->fill($validated)->save();

    return Redirect::back()->with([
      'message' => __('Личные данные успешно обновлены'),
      'status' => 'success',
    ]);
  }

  public function updateContact(Request $request, User $user)
  {
    try {
      $validated = $request->validate([
        'phone' => ['sometimes', 'nullable', 'numeric'],
        'vk' => ['sometimes', 'nullable', 'string'],
        'telegram' => ['sometimes', 'nullable', 'string'],
        'instagram' => ['sometimes', 'nullable', 'string'],
        'youtube' => ['sometimes', 'nullable', 'string'],
      ]);
    } catch (\Exception $error) {
      return Redirect::back()->withErrors([
        'message' => $error->getMessage(),
        'status' => 'error',
      ]);
    }

    $user->contact->fill($validated)->save();

    return Redirect::back()->with([
      'message' => __('Контактные данные успешно обновлены'),
      'status' => 'success',
    ]);
  }

  public function updatePassword(Request $request, User $user)
  {
    try {
      $request->validate([
        'current_password' => ['required', 'string'],
        'password' => ['required', 'confirmed'],
      ]);
    } catch (\Exception $error) {
      return Redirect::back()->with([
        'message' => $error->getMessage(),
        'status' => 'error',
      ]);
    }

    if (!Hash::check($request->current_password, $user->password)) {
      return Redirect::back()->with([
        'message' => 'Текущий пароль введен неверно.',
        'status' => 'error',
      ]);
    }

    $user->update([
      'password' => Hash::make($request->password),
    ]);

    return Redirect::back()->with([
      'message' => __('Пароль успешно изменен'),
      'status' => 'success',
    ]);
  }

  public function updateCode(Request $request, User $user)
  {
    try {
      $request->validate([
        'code' => ['required', 'numeric', 'digits:4'],
        'password' => ['required'],
      ]);
    } catch (\Exception $error) {
      return Redirect::back()->with([
        'message' => $error->getMessage(),
        'status' => 'error',
      ]);
    }

    if (!Hash::check($request->password, $user->password)) {
      return Redirect::back()->with([
        'message' => 'Пароль введен неверно.',
        'status' => 'error',
      ]);
    }

    $user->update([
      'pin_code' => $request->input('code'),
    ]);

    return Redirect::back()->with([
      'message' => __('Пароль успешно изменен'),
      'status' => 'success',
    ]);
  }

  public function uploadAvatar(Request $request, User $user, FileService $fileService)
  {
    try {
      $request->validate([
        'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:5000',
      ]);
    } catch (\Exception $error) {
      return Redirect::back()->with([
        'message' => $error->getMessage(),
        'status' => 'error',
      ]);
    }

    $filename = 'avatar_' . Str::random(10) . '.' . $request->file('avatar')->getClientOriginalExtension();

    $avatarPath = $fileService->storeFile($request->file('avatar'), 'uploads/avatars', [
      'allowedMimeTypes' => ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'],
      'fileName' => $filename,
    ]);

    $resizedAvatarPath = $fileService->optimizeImage($avatarPath, 250, 250, 'public');

    $image = Image::create([
      'user_id' => $user->id,
      'path' => $resizedAvatarPath,
      'filename' => $filename,
    ]);

    if ($user->profile->avatar) {
      $oldImage = Image::find($user->profile->avatar);
      $fileService->deleteFile($oldImage->path);
      $oldImage->delete();
    }

    $user->profile->update(['avatar' => $image->id]);

    return Redirect::back()->with([
      'message' => 'Картинка успешно загружена',
      'status' => 'success',
    ]);
  }



}
