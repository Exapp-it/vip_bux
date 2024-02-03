<?php

namespace App\Enums;

use App\Traits\EnumHelpers;

enum UserGender
{
  use EnumHelpers;

  const Male = 'male';
  const Female = 'female';


  public static function toString(): string
  {
    return implode(',', static::values());
  }

  public static function readable()
  {
    return [
      null => 'Не указан',
      static::Male => 'Мужской',
      static::Female => 'Жениский',
    ];
  }

}
