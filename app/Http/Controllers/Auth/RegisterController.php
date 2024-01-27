<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
  public function store(Request $request)
  {
    $validated = $request->validate([
      'login' => ['required', 'string'],
      'email' => ['required', 'email', Rule::unique('users')],
      'password' => ['required', 'confirmed'],
    ]);

        User::create($validated);

        return 'ok';
  }
}
