<?php


namespace App\Enums;

use App\Traits\EnumHelpers;

enum TransactionOptions
{
  use EnumHelpers;

  const types = [
    "withdrawal",
    "purchase",
    "buy",
    "transfer",
  ];

  const statuses = [
    'waiting',
    'fail',
    'success',
  ];




  public static function toString(): string
  {
    return implode(',', static::values());
  }

  public static function readable()
  {
    return [];
  }
}
