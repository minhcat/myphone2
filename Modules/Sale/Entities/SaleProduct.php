<?php

namespace Modules\Sale\Entities;

use App\Enums\TargetType;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\Variation;
use Modules\User\Entities\User;

class SaleProduct extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'target_type',
        'target_id',
        'sale_id',
        'discount_type',
        'discount_value',
        'discount_maximum',
        'discount_minimum',
        'author_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function target()
    {
        if ($this->target_type === TargetType::PRODUCT) {
            return $this->belongsTo(Product::class, 'target_id');
        }
        return $this->belongsTo(Variation::class, 'target_id');
    }

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function discountTypeShow() : Attribute
    {
        return Attribute::make(
            get: function (mixed $value, $attributes) {
                if ($attributes['discount_type'] === null) {
                    return $this->sale->discount_type;
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
                    $sale = $this->sale;
                    if ($sale?->discount_value === null) {
                        return '#';
                    }
                    return $sale->discount_value;
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
                    $sale = $this->sale;
                    if ($sale?->discount_maximum === null) {
                        return '#';
                    }
                    return $sale->discount_maximum;
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
                    $sale = $this->sale;
                    if ($sale?->discount_minimum === null) {
                        return '#';
                    }
                    return $sale->discount_minimum;
                }
                return $attributes['discount_minimum'];
            }
        );
    }
}
