<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWallet extends Model
{
  use HasFactory;

  public $timestamps = false;


  protected $fillable = [
    'user_id',
    'balance',
    'account',
    'withdrawal_limit',
  ];
}
