<?php

namespace App\Enums;

final class Gender
{
    public const MALE = 0;

    public const FEMALE = 1;

    public const OTHER = 2;

    public static function getName($value)
    {
        switch ($value) {
            case static::MALE:      return __('app.enums.gender.name.male');
            case static::FEMALE:    return __('app.enums.gender.name.female');
            case static::OTHER:     return __('app.enums.gender.name.other');
            default:                return $value;
        }
    }

    public static function getLabel($value)
    {
        switch ($value) {
            case static::MALE:      return __('app.enums.gender.label.male');
            case static::FEMALE:    return __('app.enums.gender.label.female');
            case static::OTHER:     return __('app.enums.gender.label.other');
            default:                return $value;
        }
    }
}