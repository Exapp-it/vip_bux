<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserWallet;
use App\Models\UserContact;
use App\Models\UserProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService
{
  public function registerUser(array $userData): User
  {
    try {
      DB::beginTransaction();

      $user = $this->createUser($userData);

      $this->createUserWallet($user);
      $this->createUserProfile($user);
      $this->createUserContact($user);

      DB::commit();

      return $user;
    } catch (\Exception $e) {
      DB::rollBack();
      throw new \Exception(__('Ошибка при создании пользователя: ') . $e->getMessage());
    }
  }

  private function createUser(array $userData): User
  {
    $ip = getRequestIp();

    return User::create([
      'login' => $userData['login'],
      'email' => $userData['email'],
      'ip' => $ip,
      'ref_code' => $this->generateRefCode(),
      'password' => Hash::make($userData['password']),
    ]);
  }

  private function createUserWallet(User $user)
  {
    UserWallet::create([
      'user_id' => $user->id,
      'account' => $this->generateWalletAccount('VP'),
    ]);
  }

  private function createUserProfile(User $user)
  {
    UserProfile::create([
      'user_id' => $user->id,
    ]);
  }

  private function createUserContact(User $user)
  {
    UserContact::create([
      'user_id' => $user->id,
    ]);
  }

  private function generateRefCode(int $length = 8): string
  {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    return $this->generateRandomCode($characters, $length);
  }

  private function generateWalletAccount($prefix = '', $suffix = '', $length = 8)
  {
    $baseValue = (string) (now()->timestamp * 1000);
    $randomDigits = random_int(1000, 9999);

    $baseValueString = (string) $baseValue;
    $shuffledBaseValueString = str_shuffle($baseValueString);
    $suffix = str_shuffle($suffix);

    $uniqueId = substr($shuffledBaseValueString + $randomDigits, 0, $length);

    return $prefix . $uniqueId . $suffix;
  }

  private function generateRandomCode($characters, $length)
  {
    $code = '';

    for ($i = 0; $i < $length; $i++) {
      $code .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $code;
  }
}
