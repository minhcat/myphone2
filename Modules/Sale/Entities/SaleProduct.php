<?php

namespace Modules\Sale\Entities;

use App\Enums\TargetType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\Variation;

class SaleProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'sale_id',
        'discount_type',
        'discount_value',
        'discount_maximum',
        'discount_minimum'
    ];

    public function target()
    {
        if ($this->target_type === TargetType::PRODUCT) {
            return $this->belongsTo(Product::class, 'target_id');
        }
        return $this->belongsTo(Variation::class, 'target_id');
    }
}
