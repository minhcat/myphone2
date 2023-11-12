<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Attribute\Entities\Option;

class Variation extends Model
{
    use HasFactory;

    protected $fillable = ['attribute', 'price', 'description', 'product_id'];

    public $timestamps = false;

    public function options()
    {
        return $this->belongsToMany(Option::class);
    }
}
