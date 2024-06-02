<?php

namespace App\Enums;

final class ConditionTargetType
{
    public const PRODUCT = 0;

    public const PRODUCT_GROUP = 1;

    public const CATEGORY = 2;

    public const TAG = 3;

    public static function getName($value)
    {
        switch ($value) {
            case static::PRODUCT:           return __('app.enums.condition_target_type.name.product');
            case static::PRODUCT_GROUP:     return __('app.enums.condition_target_type.name.product_group');
            case static::CATEGORY:          return __('app.enums.condition_target_type.name.category');
            case static::TAG:               return __('app.enums.condition_target_type.name.tag');
            default:                        return $value;
        }
    }

    public static function getLabel($value)
    {
        switch ($value) {
            case static::PRODUCT:           return __('app.enums.condition_target_type.label.product');
            case static::PRODUCT_GROUP:     return __('app.enums.condition_target_type.label.product_group');
            case static::CATEGORY:          return __('app.enums.condition_target_type.label.category');
            case static::TAG:               return __('app.enums.condition_target_type.label.tag');
            default:                        return $value;
        }
    }
}