<?php

namespace App\Enums;

final class DiscountType
{
    public const AMOUNT = 0;

    public const PERCENT = 1;

    public static function getName($value)
    {
        switch ($value) {
            case static::AMOUNT:    return __('app.enums.discount_form_target.name.invoice');
            case static::PERCENT:   return __('app.enums.discount_form_target.name.product');
            default:                return $value;
        }
    }

    public static function getLabel($value)
    {
        switch ($value) {
            case static::AMOUNT:    return __('app.enums.discount_form_target.label.invoice');
            case static::PERCENT:   return __('app.enums.discount_form_target.label.product');
            default:                return $value;
        }
    }
}