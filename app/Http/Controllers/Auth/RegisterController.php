<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{


  public function store(Request $request, UserService $userService)
  {
    $this->validateUser($request);

    try {
      $user = $userService->registerUser($request->only(['login', 'email', 'password']));
      event(new Registered($user));
      Auth::login($user);
    } catch (\Exception $e) {
      return Redirect::back()->withErrors([
        'message' => $e->getMessage(),
        'status' => 'error',
      ]);
    }

    return Redirect::route('verification.notice')->with([
      'message' => __('Регистрация прошла успешно. Пожалуйста, проверьте свою электронную почту, чтобы подтвердить учетную запись.'),
      'status' => 'success',
    ]);
  }

  private function validateUser(Request $request)
  {
    $request->validate([
      'login' => ['required', 'string', Rule::unique('users')],
      'email' => ['required', 'email', Rule::unique('users')],
      'password' => ['required', 'confirmed'],
    ]);
  }
}
