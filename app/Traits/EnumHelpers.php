<?php

namespace App\Traits;

trait EnumHelpers
{
    public static function all(): array
    {
        return (new \ReflectionClass(static::class))->getConstants();
    }

    public static function keys(): array
    {
        return array_keys(static::all());
    }

    public static function values(): array
    {
        return array_values(static::all());
    }

    public static function hasKey(string $key): bool
    {
        return in_array($key, static::keys(), true);
    }

    public static function hasValue(string $value): bool
    {
        return in_array($value, static::values(), true);
    }

    public static function getByKey(string $key): ?string
    {
        return static::hasKey($key) ? static::all()[$key] : null;
    }

    public static function getByValue(string $value): ?string
    {
        return static::hasValue($value) ? array_flip(static::all())[$value] : null;
    }
}
