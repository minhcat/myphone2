<?php

namespace App\Enums;

final class TotalRangeType extends AbstractEnum
{
    public const EQUAL = 0;

    public const NOT_EQUAL = 1;

    public static function getName($value)
    {
        switch ($value) {
            case static::EQUAL:     return __('enum.total_range_type.name.equal');
            case static::NOT_EQUAL: return __('enum.total_range_type.name.not_equal');
            default:                return $value;
        }
    }

    public static function getLabel($value)
    {
        switch ($value) {
            case static::EQUAL:     return __('enum.total_range_type.label.equal');
            case static::NOT_EQUAL: return __('enum.total_range_type.label.not_equal');
            default:                return $value;
        }
    }

    public static function getList(): array
    {
        return [
            self::EQUAL,
            self::NOT_EQUAL
        ];
    }
}