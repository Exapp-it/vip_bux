<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
  public function index()
  {

    $user = Auth::user();

    return Inertia::render('User/profile', [
      'title' => "Профиль пользователя",
    ]);
  }
}
