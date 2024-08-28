<?php

namespace App\Enums;

final class GenerateType extends AbstractEnum
{
    public const RANDOM = 0;

    public const SEQUENTIAL = 1;

    public static function getName($value)
    {
        switch ($value) {
            case static::RANDOM:        return __('enum.condition_type.name.quantity');
            case static::SEQUENTIAL:    return __('enum.condition_type.name.total');
            default:                    return $value;
        }
    }

    public static function getLabel($value)
    {
        switch ($value) {
            case static::RANDOM:        return __('enum.condition_type.label.quantity');
            case static::SEQUENTIAL:    return __('enum.condition_type.label.total');
            default:                    return $value;
        }
    }

    public static function getList(): array
    {
        return [
            static::RANDOM,
            static::SEQUENTIAL,
        ];
    }
}