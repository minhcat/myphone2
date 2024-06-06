<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    protected function name(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
                $product = $this->product;
                $options = $this->options;
                $option_name = '';
                foreach ($options as $key => $option) {
                    if ($key !== count($options) - 1) {
                        $option_name .= $option->value . ',';
                    } else {
                        $option_name .= $option->value;
                    }
                }

                return $product->name . ' (' . $option_name . ')';
            }
        );
    }
}
