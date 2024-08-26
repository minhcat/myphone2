<?php

namespace Modules\Product\Entities;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Brand\Entities\Brand;
use Modules\Category\Entities\Category;
use Modules\Tag\Entities\Tag;
use Modules\User\Entities\User;

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
        'author_id',
        'created_at',
        'updated_at',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function user() 
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getSkuAttribute()
    {
        return $this->sku_prefix . '-' . $this->sku_number;
    }

    public function getPriceFormatAttribute()
    {
        return number_format($this->price);
    }

    public static function newFactory()
    {
        return new ProductFactory();
    }
}
