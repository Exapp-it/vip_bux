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
    'adv_balance',
    'account',
    'withdrawal_limit',
  ];


  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public static function generateAccount($prefix = '', $suffix = '', $length = 8)
  {
    $baseValue = (string) (now()->timestamp * 1000);
    $randomDigits = random_int(1000, 9999);

    $baseValueString = (string) $baseValue;
    $shuffledBaseValueString = str_shuffle($baseValueString);
    $suffix = str_shuffle($suffix);

    $uniqueId = substr($shuffledBaseValueString + $randomDigits, 0, $length);

    return $prefix . $uniqueId . $suffix;
  }

}
