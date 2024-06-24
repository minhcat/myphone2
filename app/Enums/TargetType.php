<?php

namespace App\Enums;

final class TargetType extends AbstractEnum
{
    public const PRODUCT = 0;

    public const VARIANT = 1;

    public static function getName($value)
    {
        switch ($value) {
            case static::PRODUCT:   return __('enum.target_type.name.product');
            case static::VARIANT:   return __('enum.target_type.name.variant');
            default:                return $value;
        }
    }

    public static function getLabel($value)
    {
        switch ($value) {
            case static::PRODUCT:   return __('enum.target_type.label.product');
            case static::VARIANT:   return __('enum.target_type.label.variant');
            default:                return $value;
        }
    }

    public static function getList(): array
    {
        return [
            self::PRODUCT,
            self::VARIANT
        ];
    }
}