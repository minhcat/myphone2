<?php

namespace App\Enums;

final class TargetType extends AbstractEnum
{
    public const PRODUCT = 0;

    public const VARIANT = 1;

    public static function getName($value)
    {
        switch ($value) {
            case static::PRODUCT:   return __('enum.discount_target.name.invoice');
            case static::VARIANT:   return __('enum.discount_target.name.transport_fee');
            default:                return $value;
        }
    }

    public static function getLabel($value)
    {
        switch ($value) {
            case static::PRODUCT:   return __('enum.discount_target.label.invoice');
            case static::VARIANT:   return __('enum.discount_target.label.transport_fee');
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