<?php

namespace App\Enums;

final class PromotionStatus
{
    public const RAW = 0;

    public const PENDING = 1;

    public const APPROVED = 2;

    public const INPROGRESS = 3;

    public const END = 4;

    public static function getName($value)
    {
        switch ($value) {
            case static::RAW:           return __('app.enums.promotion_status.name.raw');
            case static::PENDING:       return __('app.enums.promotion_status.name.pending');
            case static::APPROVED:      return __('app.enums.promotion_status.name.approved');
            case static::INPROGRESS:    return __('app.enums.promotion_status.name.inprogress');
            case static::END:           return __('app.enums.promotion_status.name.end');
            default:                    return $value;
        }
    }

    public static function getLabel($value) {
        switch ($value) {
            case static::RAW:           return __('app.enums.promotion_status.label.raw');
            case static::PENDING:       return __('app.enums.promotion_status.label.pending');
            case static::APPROVED:      return __('app.enums.promotion_status.label.approved');
            case static::INPROGRESS:    return __('app.enums.promotion_status.label.inprogress');
            case static::END:           return __('app.enums.promotion_status.label.end');
            default:                    return $value;
        }
    }
}