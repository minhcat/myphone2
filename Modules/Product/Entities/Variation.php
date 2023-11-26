<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Attribute\Entities\Option;

class Variation extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'price', 'description', 'product_id'];

    public $timestamps = false;

    public function options()
    {
        return $this->belongsToMany(Option::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
