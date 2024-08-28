<?php

namespace App\Enums;

final class FakerConditionType extends AbstractEnum
{
    public const EQUAL = 0;

    public const NOT_EQUAL = 1;

    public static function getName($value)
    {
        switch ($value) {
            case static::EQUAL:         return __('enum.faker_condition_type.name.quantity');
            case static::NOT_EQUAL:     return __('enum.faker_condition_type.name.total');
            default:                    return $value;
        }
    }

    public static function getLabel($value)
    {
        switch ($value) {
            case static::EQUAL:         return __('enum.faker_condition_type.label.quantity');
            case static::NOT_EQUAL:     return __('enum.faker_condition_type.label.total');
            default:                    return $value;
        }
    }

    public static function getList(): array
    {
        return [
            static::EQUAL,
            static::NOT_EQUAL,
        ];
    }
}