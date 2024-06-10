<?php

namespace App\Enums;

final class DiscountTarget
{
    public const INVOICE = 0;

    public const PRODUCT = 1;

    public const TRANSPORT_FEE = 2;

    public static function getName($value)
    {
        switch ($value) {
            case static::INVOICE:       return __('app.enums.discount_target.name.invoice');
            case static::PRODUCT:       return __('app.enums.discount_target.name.product');
            case static::TRANSPORT_FEE: return __('app.enums.discount_target.name.transport_fee');
            default:                    return $value;
        }
    }

    public static function getLabel($value)
    {
        switch ($value) {
            case static::INVOICE:       return __('app.enums.discount_target.label.invoice');
            case static::PRODUCT:       return __('app.enums.discount_target.label.product');
            case static::TRANSPORT_FEE: return __('app.enums.discount_target.label.transport_fee');
            default:                    return $value;
        }
    }

    public static function getList()
    {
        return [
            self::INVOICE,
            self::PRODUCT,
            self::TRANSPORT_FEE
        ];
    }

    public static function getObject($list = null)
    {
        if ($list === null) {
            $list = self::getList();
        }
        $objects = [];

        foreach ($list as $item) {
            $objects[] = (object) [
                'code'  => $item,
                'name'  => self::getName($item),
                'label' => self::getLabel($item)
            ];
        }

        return $objects;
    }
}