<?php

namespace App\Http\Controllers\Auth;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function store(Request $request)
  {
    $credentials = $request->validate([
      'login' => ['required', 'string'],
      'password' => ['required', 'string'],
    ]);


    if (!Auth::attempt($credentials, $request->has('remember'))) {
      return redirect()
        ->route('home.index')
        ->with([
          'message' => 'Неверные учетные данные',
          'success' => false,
        ]);
    }

    return redirect()
      ->route('user.index');
  }
}
