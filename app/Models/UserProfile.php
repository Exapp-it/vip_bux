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
  ];
}
