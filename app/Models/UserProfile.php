<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
  use HasFactory;

  public $timestamps = false;


  protected $fillable = [
    'user_id',
    'lastname',
    'name',
    'birthday',
    'gender',
    'occupation',
    'country',
    'region',
    'city',
    'email_verified',
    'phone_verified',
    'telegram_verified',
  ];

  protected $casts = [
    'email_verified' => 'boolean',
    'phone_verified' => 'boolean',
    'telegram_verified' => 'boolean',
  ];

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}
