<?php

namespace App\Enums;

final class GenerateType extends AbstractEnum
{
    public const RANDOM = 0;

    public const SEQUENTIAL = 1;

    public static function getName($value)
    {
        switch ($value) {
            case static::RANDOM:        return __('enum.generate_type.name.random');
            case static::SEQUENTIAL:    return __('enum.generate_type.name.sequential');
            default:                    return $value;
        }
    }

    public static function getLabel($value)
    {
        switch ($value) {
            case static::RANDOM:        return __('enum.generate_type.label.random');
            case static::SEQUENTIAL:    return __('enum.generate_type.label.sequential');
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