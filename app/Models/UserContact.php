<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserContact extends Model
{
  use HasFactory;

  public $timestamps = false;


  protected $fillable = [
    'user_id',
    'phone',
    'vk',
    'telegram',
    'instagram',
    'youtube',
  ];
}
