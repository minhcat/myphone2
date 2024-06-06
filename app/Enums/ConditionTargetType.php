<?php

namespace App\Enums;

final class ConditionTargetType
{
    public const VARIANT = 0;

    public const PRODUCT = 1;

    public const PRODUCT_GROUP = 2;

    public const CATEGORY = 3;

    public const TAG = 4;

    public static function getName($value)
    {
        switch ($value) {
            case static::VARIANT:           return __('app.enums.condition_target_type.name.variant');
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
            case static::VARIANT:           return __('app.enums.condition_target_type.label.variant');
            case static::PRODUCT:           return __('app.enums.condition_target_type.label.product');
            case static::PRODUCT_GROUP:     return __('app.enums.condition_target_type.label.product_group');
            case static::CATEGORY:          return __('app.enums.condition_target_type.label.category');
            case static::TAG:               return __('app.enums.condition_target_type.label.tag');
            default:                        return $value;
        }
    }

    public static function getList()
    {
        return [
            static::VARIANT,
            static::PRODUCT,
            static::PRODUCT_GROUP,
            static::CATEGORY,
            static::TAG
        ];
    }

    public static function getObject($list = null)
    {
        if ($list === null) {
            $list = self::getList();
        }
        $objects = [];

        foreach ($list as $item) {
            $objects[] = (object) [
                'code'  => $item,
                'name'  => self::getName($item),
                'label' => self::getLabel($item)
            ];
        }

        return $objects;
    }
}