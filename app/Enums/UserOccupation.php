<?php


namespace App\Enums;

use App\Traits\EnumHelpers;

enum UserOccupation
{

  use EnumHelpers;


  const SchoolStudent = 'schoolStudent';
  const Student = 'student';
  const Employee = 'employee';
  const Manager = 'manager';
  const OfflineBusinessOwner = 'offlineBusinessOwner';
  const ITBusinessOwner = 'ITBusinessOwner';
  const Unemployed = 'unemployed';

  public static function toString(): string
  {
    return implode(',', static::values());
  }

  public static function readable()
  {
    return [
      static::SchoolStudent => 'Школьник',
      static::Student => 'Студент',
      static::Employee => 'Сотрудник',
      static::Manager => 'Управляющий',
      static::OfflineBusinessOwner => 'Владелец офлайн-бизнеса',
      static::ITBusinessOwner => 'Владелец ИТ-бизнеса',
      static::Unemployed => 'Безработный',
    ];
  }
}
