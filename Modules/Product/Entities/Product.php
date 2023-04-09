<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function getSkuAttribute()
    {
        return $this->sku_prefix . '-' . $this->sku_number;
    }

    public function getBrandAttribute()
    {
        switch ($this->brand_id) {
            case 1: return 'Apple';
            case 2: return 'Samsung';
            case 3: return 'Xiaomi';
            case 4: return 'OPPO';
            case 5: return 'Vivo';
            default: return '';
        }
    }

    protected function price() : Attribute
    {
        return Attribute::make(
            get: fn ($value) => number_format($value) . ' vnđ'
        );
    }

    protected function createdAt() : Attribute
    {
        return Attribute::make(
            get: fn ($value) => date('H:i:s d/m/Y', strtotime($value))
        );
    }

    protected function updatedAt() : Attribute
    {
        return Attribute::make(
            get: fn ($value) => date('H:i:s d/m/Y', strtotime($value))
        );
    }
}
