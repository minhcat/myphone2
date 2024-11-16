<?php

namespace App\Enums;

final class ThemeStatus extends AbstractEnum
{
    public const ACTIVE = 0;

    public const UNACTIVE = 1;

    public static function getName($value)
    {
        switch ($value) {
            case static::ACTIVE:    return __('enum.theme_status.name.active');
            case static::UNACTIVE:  return __('enum.theme_status.name.unactive');
            default:                return $value;
        }
    }

    public static function getLabel($value)
    {
        switch ($value) {
            case static::ACTIVE:    return __('enum.theme_status.label.active');
            case static::UNACTIVE:  return __('enum.theme_status.label.unactive');
            default:                return $value;
        }
    }

    public static function getList(): array
    {
        return [
            static::ACTIVE,
            static::UNACTIVE,
        ];
    }

    public static function checkActive($status)
    {
        return $status === static::ACTIVE;
    }
}