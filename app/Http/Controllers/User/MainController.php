<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
  public function index()
  {
    return Inertia::render('User/index', [
      'title' => 'Личный кабинет',
    ]);
  }
}
