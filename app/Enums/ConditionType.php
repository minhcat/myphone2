<?php

namespace App\Enums;

final class ConditionType extends AbstractEnum
{
    public const QUANTITY = 0;

    public const TOTAL = 1;

    public static function getName($value)
    {
        switch ($value) {
            case static::QUANTITY:  return __('app.enums.condition_type.name.quantity');
            case static::TOTAL:     return __('app.enums.condition_type.name.total');
            default:                        return $value;
        }
    }

    public static function getLabel($value)
    {
        switch ($value) {
            case static::QUANTITY:  return __('app.enums.condition_type.label.quantity');
            case static::TOTAL:     return __('app.enums.condition_type.label.total');
            default:                        return $value;
        }
    }

    public static function getList(): array
    {
        return [
            static::QUANTITY,
            static::TOTAL,
        ];
    }
}