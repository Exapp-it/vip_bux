<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
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

}
