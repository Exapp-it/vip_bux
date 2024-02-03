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
    'avatar',
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

  public function image()
  {
      return $this->belongsTo(Image::class, 'avatar');
  }

  public function getGenderReadableAttribute()
  {
    return $this->gender === null ? __('Не указан') : ($this->gender == 'male' ? __('Мужской') : __('Женский'));
  } 
  
  public function getAvatarUrlAttribute()
  {
        return $this->avatar ? '/storage/' . $this?->image->path : null;
  }
}
