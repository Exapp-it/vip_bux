<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
  public function store(Request $request)
  {
    $request->validate([
      'login' => ['required', 'string'],
      'email' => ['required', 'email', Rule::unique('users')],
      'password' => ['required', 'confirmed'],
    ]);


    try {
      DB::beginTransaction();
      $ip = getRequestIp();
      User::create([
        'login' => $request->post('login'),
        'email' => $request->post('email'),
        'id' => $ip,
        'password' => Hash::make($request->post('password')),
      ]);

      

      DB::commit();
    } catch (\Exception $e) {
      DB::rollBack();
      Log::error(__('Error while creating user: ') . $e->getMessage());
      throw new \Exception($e->getMessage());
    }

    return 'ok';
  }
}
