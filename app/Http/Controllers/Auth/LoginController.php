<?php

namespace App\Http\Controllers\Auth;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\User\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
  public function store(Request $request, UserService $userService)
  {
    $credentials = $request->validate([
      'login' => ['required', 'string'],
      'password' => ['required', 'string'],
    ]);

    if (!Auth::attempt($credentials, $request->has('remember'))) {
      return $this->loginFailedResponse();
    }

    $this->generateAndSendVerificationCode($request->user(), $userService);

    return Redirect::route('user.auth.verifyShow')->with([
      'message' => 'Код отправлен на ваш Email',
      'status' => 'success',
    ]);
  }

  public function authVerifyShow()
  {
    return Inertia::render('User/verify-auth', [
      'title' => __('Подтверждение входа'),
    ]);
  }

  public function authVerify(Request $request)
  {
    $request->validate([
      'code' => ['required', 'numeric', 'digits:4'],
    ]);

    $user = Auth::user();

    if ($user->auth_code == $request->input('code')) {
      $this->clearVerificationCode($user);
      return Redirect::route('user.index');
    } else {
      return Redirect::back()->with([
        'message' => 'Неверный верификационный код',
        'status' => 'error',
      ]);
    }
  }

  public function logout(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return Redirect::route('home.index');
  }

  protected function loginFailedResponse()
  {
    return Redirect::back()
      ->with([
        'message' => 'Неверные учетные данные',
        'status' => 'error',
      ]);
  }

  protected function generateAndSendVerificationCode($user, $userService)
  {
    $code = $userService->generateRandomCode(length: 4);
    $user->auth_code = $code;
    $user->save();

    Mail::to($user->email)->send(new \App\Mail\VerificationCodeMail($code));
  }

  protected function clearVerificationCode($user)
  {
    $user->update(['auth_code' => null]);
  }
}
