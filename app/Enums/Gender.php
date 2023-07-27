<?php

namespace App\Enums;

final class Gender
{
    public const MALE = 0;

    public const FEMALE = 1;

    public const OTHER = 2;

    public static function getDescription($value)
    {
        if ($value == static::MALE) {
            return __('app.enums.male');
        }
        if ($value == static::FEMALE) {
            return __('app.enums.female');
        }
        if ($value == static::OTHER) {
            return __('app.enums.other');
        }

        return $value;
    }
}