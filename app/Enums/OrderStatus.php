<?php

namespace App\Enums;

final class OrderStatus extends AbstractEnum
{
    public const PENDING = 1;

    public const APPROVED = 2;

    public const SHIPPING = 3;

    public const COMPLETED = 4;

    public const CANCELLED = 5;

    public const OTHER = 6;

    public static function getName($value)
    {
        switch ($value) {
            case static::PENDING:   return __('enum.order_status.name.pending');
            case static::APPROVED:  return __('enum.order_status.name.approved');
            case static::SHIPPING:  return __('enum.order_status.name.shipping');
            case static::COMPLETED: return __('enum.order_status.name.completed');
            case static::CANCELLED: return __('enum.order_status.name.cancelled');
            case static::OTHER:     return __('enum.order_status.name.other');
            default:                return $value;
        }
    }

    public static function getLabel($value) {
        switch ($value) {
            case static::PENDING:   return __('enum.order_status.label.pending');
            case static::APPROVED:  return __('enum.order_status.label.approved');
            case static::SHIPPING:  return __('enum.order_status.label.shipping');
            case static::COMPLETED: return __('enum.order_status.label.completed');
            case static::CANCELLED: return __('enum.order_status.label.cancelled');
            case static::OTHER:     return __('enum.order_status.label.other');
            default:                return $value;
        }
    }

    public static function getList(): array
    {
        return [
            static::PENDING,
            static::APPROVED,
            static::SHIPPING,
            static::COMPLETED,
            static::CANCELLED,
            static::OTHER,
        ];
    }
}