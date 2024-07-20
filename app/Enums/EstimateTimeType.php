<?php

namespace App\Enums;

final class EstimateTimeType extends AbstractEnum
{
    public const HOUR = 0;

    public const DAY = 1;

    public static function getName($value)
    {
        switch ($value) {
            case static::HOUR:  return __('enum.estimate_time_type.name.amount');
            case static::DAY:   return __('enum.estimate_time_type.name.percent');
            default:            return $value;
        }
    }

    public static function getLabel($value)
    {
        switch ($value) {
            case static::HOUR:  return __('enum.estimate_time_type.label.amount');
            case static::DAY:   return __('enum.estimate_time_type.label.percent');
            default:            return $value;
        }
    }

    public static function getList(): array
    {
        return [
            self::HOUR,
            self::DAY
        ];
    }
}