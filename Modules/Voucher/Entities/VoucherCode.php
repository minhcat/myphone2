<?php

namespace Modules\Voucher\Entities;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VoucherCode extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'code',
        'discount_type',
        'discount_value',
        'discount_maximum',
        'discount_minimum',
    ];

    public function Voucher()
    {
        return $this->belongsTo(Voucher::class);
    }

    public function discountTypeShow() : Attribute
    {
        return Attribute::make(
            get: function (mixed $value, $attributes) {
                if ($attributes['discount_type'] === null) {
                    return $this->voucher->discount_type;
                }
                return $attributes['discount_type'];
            }
        );
    }

    public function discountValueShow() : Attribute
    {
        return Attribute::make(
            get: function (mixed $value, $attributes) {
                if ($attributes['discount_value'] === null) {
                    $voucher = $this->voucher;
                    if ($voucher?->discount_value === null) {
                        return '#';
                    }
                    return $voucher->discount_value;
                }
                return $attributes['discount_value'];
            }
        );
    }

    public function discountMaximumShow() : Attribute
    {
        return Attribute::make(
            get: function (mixed $value, $attributes) {
                if ($attributes['discount_maximum'] === null) {
                    $voucher = $this->voucher;
                    if ($voucher?->discount_maximum === null) {
                        return '#';
                    }
                    return $voucher->discount_maximum;
                }
                return $attributes['discount_maximum'];
            }
        );
    }

    public function discountMinimumShow() : Attribute
    {
        return Attribute::make(
            get: function (mixed $value, $attributes) {
                if ($attributes['discount_minimum'] === null) {
                    $voucher = $this->voucher;
                    if ($voucher?->discount_minimum === null) {
                        return '#';
                    }
                    return $voucher->discount_minimum;
                }
                return $attributes['discount_minimum'];
            }
        );
    }
}
