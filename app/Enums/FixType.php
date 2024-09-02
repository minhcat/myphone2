<?php

namespace App\Enums;

final class FixType extends AbstractEnum
{
    public const PREFIX = 0;

    public const SUFFIX = 1;

    public static function getName($value)
    {
        switch ($value) {
            case static::PREFIX:    return __('enum.fix_type.name.prefix');
            case static::SUFFIX:    return __('enum.fix_type.name.suffix');
            default:                return $value;
        }
    }

    public static function getLabel($value)
    {
        switch ($value) {
            case static::PREFIX:    return __('enum.fix_type.label.prefix');
            case static::SUFFIX:    return __('enum.fix_type.label.suffix');
            default:                return $value;
        }
    }

    public static function getList(): array
    {
        return [
            static::PREFIX,
            static::SUFFIX,
        ];
    }
}