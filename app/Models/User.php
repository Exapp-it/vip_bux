<?php

namespace App\Models;

use App\Models\UserWallet;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
  use HasApiTokens, HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'login',
    'email',
    'ref_level_1',
    'ref_level_2',
    'ref_level_3',
    'ref_code',
    'pin_code',
    'auth_code',
    'active',
    'role',
    'ip',
    'password',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
    'password' => 'hashed',
  ];


  public function referrerLevel1()
  {
    return $this->belongsTo(User::class, 'ref_level_1');
  }

  public function referrerLevel2()
  {
    return $this->belongsTo(User::class, 'ref_level_2');
  }

  public function referrerLevel3()
  {
    return $this->belongsTo(User::class, 'ref_level_3');
  }

  public function referralsLevel1()
  {
    return $this->hasMany(User::class, 'ref_level_1');
  }

  public function referralsLevel2()
  {
    return $this->hasMany(User::class, 'ref_level_2');
  }

  public function referralsLevel3()
  {
    return $this->hasMany(User::class, 'ref_level_3');
  }

  public function wallet()
  {
    return $this->hasOne(UserWallet::class, 'user_id');
  }

  public function profile()
  {
    return $this->hasOne(UserProfile::class, 'user_id');
  }

  public function contact()
  {
    return $this->hasOne(UserContact::class, 'user_id');
  }
}
