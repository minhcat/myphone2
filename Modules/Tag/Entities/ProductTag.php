<?php

namespace Modules\Tag\Entities;

use Database\Factories\ProductTagFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductTag extends Model
{
    use HasFactory {
        factory as protected traitFactory;
    }

    public $timestamps = false;
    protected $table = 'product_tag';
    protected $fillable = ['product_id', 'tag_id'];
    
    protected static function newFactory()
    {
        return new ProductTagFactory();
    }

    public static function factory($count = null, $state = [])
    {
        if (is_numeric($count)) {
            $count = min($count, count_available_product());
        }

        return static::traitFactory($count, $state);
    }
}
