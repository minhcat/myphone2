<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Brand\Entities\Brand;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'sku_prefix',
        'sku_number',
        'price',
        'description',
        'note',
        'brand_id',
        'created_at',
        'updated_at',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function getSkuAttribute()
    {
        return $this->sku_prefix . '-' . $this->sku_number;
    }

    public function getPriceFormatAttribute()
    {
        return number_format($this->price);
    }
}
