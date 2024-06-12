<?php

namespace App\Enums;

final class DiscountType extends AbstractEnum
{
    public const AMOUNT = 0;

    public const PERCENT = 1;

    public static function getName($value)
    {
        switch ($value) {
            case static::AMOUNT:    return __('app.enums.discount_type.name.amount');
            case static::PERCENT:   return __('app.enums.discount_type.name.percent');
            default:                return $value;
        }
    }

    public static function getLabel($value)
    {
        switch ($value) {
            case static::AMOUNT:    return __('app.enums.discount_type.label.amount');
            case static::PERCENT:   return __('app.enums.discount_type.label.percent');
            default:                return $value;
        }
    }

    public static function getList(): array
    {
        return [
            self::AMOUNT,
            self::PERCENT
        ];
    }
}