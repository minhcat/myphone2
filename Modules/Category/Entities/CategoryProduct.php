<?php

namespace Modules\Category\Entities;

use Database\Factories\CategoryProductFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryProduct extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'category_product';
    protected $fillable = ['category_id', 'product_id'];
    
    protected static function newFactory()
    {
        return new CategoryProductFactory();
    }
}
