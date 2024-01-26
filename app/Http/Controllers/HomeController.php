<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

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
}
