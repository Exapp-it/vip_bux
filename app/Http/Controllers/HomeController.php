<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
  public function index()
  {
    return Inertia::render('Home/index', [
      'title' => 'Главная страница',
      'test' => 'test',
    ]);
  }

  public function about()
  {
    return Inertia::render('Home/about', [
      'title' => 'Главная about',
    ]);
  }


  public function captureInviteCode($code)
  {
    $referrerUser = User::where('ref_code', $code)->first();

    if ($referrerUser) {
      $expires = now()->addDays(30);
      $expiresTimestamp = $expires->timestamp;
      Cookie::queue('ref', $referrerUser->id, $expiresTimestamp);
    }

    return Redirect::route('home.index');
  }
}
