<?php

namespace App\Http\Controllers\Auth;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailVerificationController extends Controller
{
  public function index()
  {
    return Inertia::render('User/verify-email', [
      'title' => __('Подтверждение почты'),
    ]);
  }

  public function send(Request $request)
  {
    $request->user()->sendEmailVerificationNotification();
    return back()->with(['message' => 'Verification link sent!', 'status' => 'success']);
  }

  public function verify(EmailVerificationRequest $request)
  {
    $request->fulfill();

    return redirect()->route('user.index')->with([
      'message' => __('Верификация прошла успешно!'),
      'status' => 'success',
    ]);
  }

}
