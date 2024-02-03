<?php

namespace App\Services\User;

use App\Models\User;
use GuzzleHttp\Client;
use App\Models\UserWallet;
use League\ISO3166\ISO3166;
use App\Services\Geo\GeoService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService
{
  protected ?User $user = null;
  public function registerUser(array $userData, GeoService $geoService, ?User $ref = null): User
  {
    try {
      DB::beginTransaction();
      $ip = getRequestIp();
      $geo = $geoService->getGeoData($ip);
      $userData['ip'] = $ip;
      $userData['ref_level_1'] = $ref->id;
      $userData['ref_level_2'] = $ref->ref_level_1;
      $userData['ref_level_3'] = $ref->ref_level_2;

      $this->user = $this->createUser($userData);

      $this->createUserWallet();
      $this->createUserProfile($geo);
      $this->createUserContact();

      DB::commit();

      return $this->user;
    } catch (\Exception $e) {
      DB::rollBack();
      throw new \Exception(__('Ошибка при создании пользователя: ') . $e->getMessage());
    }
  }

  private function createUser(array $userData): User
  {
    return User::create([
      'login' => $userData['login'],
      'email' => $userData['email'],
      'ip' => $userData['ip'],
      'ref_code' => $this->generateRefCode(),
      'ref_level_1' => $userData['ref_level_1'],
      'ref_level_2' => $userData['ref_level_2'],
      'ref_level_3' => $userData['ref_level_3'],
      'password' => Hash::make($userData['password']),
    ]);
  }

  private function createUserWallet()
  {
    $this->user->wallet()->create([
      'account' => UserWallet::generateAccount('VP'),
    ]);
  }

  private function createUserProfile($geo)
  {
    $this->user->profile()->create([
      'country' => $geo->country,
      'region' => $geo->region,
      'city' => $geo->city,
    ]);
  }

  private function createUserContact()
  {
    $this->user->contact()->create([]);
  }

  private function generateRefCode(int $length = 8): string
  {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    return $this->generateRandomCode($length, $characters);
  }

  public function generateRandomCode($length = 6, $characters = '0123456789')
  {
    $code = '';

    for ($i = 0; $i < $length; $i++) {
      $code .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $code;
  }
}
