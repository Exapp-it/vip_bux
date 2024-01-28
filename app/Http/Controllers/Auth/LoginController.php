<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
  public function store(Request $request)
  {
    $credentials = $request->validate([
      'login' => ['required', 'string'],
      'password' => ['required', 'string'],
    ]);


    if (!Auth::attempt($credentials, $request->has('remember'))) {
      return Redirect::route('home.index')
        ->with([
          'message' => 'Неверные учетные данные',
          'status' => 'error',
        ]);
    }

    return Redirect::route('user.index');
  }

  public function logout(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return Redirect::route('home.index');
  }
}
