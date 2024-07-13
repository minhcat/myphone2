<?php

namespace App\Enums;

final class TerritoryType extends AbstractEnum
{
    public const CITY = 0;

    public const DISTRICT = 1;

    public const WARD = 2;

    public static function getName($value)
    {
        switch ($value) {
            case static::CITY:      return __('enum.territory_type.name.city');
            case static::DISTRICT:  return __('enum.territory_type.name.district');
            case static::WARD:      return __('enum.territory_type.name.ward');
            default:                return $value;
        }
    }

    public static function getLabel($value)
    {
        switch ($value) {
            case static::CITY:      return __('enum.territory_type.label.city');
            case static::DISTRICT:  return __('enum.territory_type.label.district');
            case static::WARD:      return __('enum.territory_type.label.ward');
            default:                return $value;
        }
    }

    public static function getList(): array
    {
        return [
            self::CITY,
            self::DISTRICT,
            self::WARD
        ];
    }
}