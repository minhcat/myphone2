<?php

namespace App\Enums;

final class ConditionType extends AbstractEnum
{
    public const QUANTITY = 0;

    public const TOTAL = 1;

    public static function getName($value)
    {
        switch ($value) {
            case static::QUANTITY:  return __('app.enums.condition_type.name.invoice_quantity');
            case static::TOTAL:     return __('app.enums.condition_type.name.invoice_total');
            default:                        return $value;
        }
    }

    public static function getLabel($value)
    {
        switch ($value) {
            case static::QUANTITY:  return __('app.enums.condition_type.label.invoice_quantity');
            case static::TOTAL:     return __('app.enums.condition_type.label.invoice_total');
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