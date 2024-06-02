<?php

namespace App\Enums;

final class ConditionType
{
    public const INVOICE_QUANTITY = 0;

    public const INVOICE_TOTAL = 1;

    public const PRODUCT = 2;

    public const PRODUCT_GROUP = 3;

    public const CATEGORY = 4;

    public const TAG = 5;

    public static function getName($value)
    {
        switch ($value) {
            case static::INVOICE_QUANTITY:  return __('app.enums.condition_type.name.invoice_quantity');
            case static::INVOICE_TOTAL:     return __('app.enums.condition_type.name.invoice_total');
            case static::PRODUCT:           return __('app.enums.condition_type.name.product');
            case static::PRODUCT_GROUP:     return __('app.enums.condition_type.name.product_group');
            case static::CATEGORY:          return __('app.enums.condition_type.name.category');
            case static::TAG:               return __('app.enums.condition_type.name.tag');
            default:                        return $value;
        }
    }

    public static function getLabel($value)
    {
        switch ($value) {
            case static::INVOICE_QUANTITY:  return __('app.enums.condition_type.label.invoice_quantity');
            case static::INVOICE_TOTAL:     return __('app.enums.condition_type.label.invoice_total');
            case static::PRODUCT:           return __('app.enums.condition_type.label.product');
            case static::PRODUCT_GROUP:     return __('app.enums.condition_type.label.product_group');
            case static::CATEGORY:          return __('app.enums.condition_type.label.category');
            case static::TAG:               return __('app.enums.condition_type.label.tag');
            default:                        return $value;
        }
    }
}