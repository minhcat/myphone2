<?php

namespace App\Enums;

final class DiscountTarget extends AbstractEnum
{
    public const INVOICE = 0;

    public const TRANSPORT_FEE = 1;

    public static function getName($value)
    {
        switch ($value) {
            case static::INVOICE:       return __('enum.discount_target.name.invoice');
            case static::TRANSPORT_FEE: return __('enum.discount_target.name.transport_fee');
            default:                    return $value;
        }
    }

    public static function getLabel($value)
    {
        switch ($value) {
            case static::INVOICE:       return __('enum.discount_target.label.invoice');
            case static::TRANSPORT_FEE: return __('enum.discount_target.label.transport_fee');
            default:                    return $value;
        }
    }

    public static function getList(): array
    {
        return [
            self::INVOICE,
            self::TRANSPORT_FEE
        ];
    }
}