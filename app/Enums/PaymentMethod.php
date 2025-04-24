<?php

namespace App\Enums;

final class PaymentMethod extends AbstractEnum
{
    public const ONLINE = 0;

    public const CASH_ON_DELIVERY = 1;

    public static function getName($value)
    {
        switch ($value) {
            case static::ONLINE:            return __('enum.payment_method.name.online');
            case static::CASH_ON_DELIVERY:  return __('enum.payment_method.name.cash_on_delivery');
            default:                        return $value;
        }
    }

    public static function getLabel($value)
    {
        switch ($value) {
            case static::ONLINE:            return __('enum.payment_method.label.online');
            case static::CASH_ON_DELIVERY:  return __('enum.payment_method.label.cash_on_delivery');
            default:                        return $value;
        }
    }

    public static function getList(): array
    {
        return [
            self::ONLINE,
            self::CASH_ON_DELIVERY,
        ];
    }
}