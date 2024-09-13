<?php

namespace Database\Factories;

use Database\Fakers\ProductFaker;
use Faker\Provider\Lorem;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Modules\Product\Entities\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $product = new ProductFaker();

        return [
            'name'          => $product->name,
            'slug'          => $product->slug,
            'sku_prefix'    => $product->sku_prefix,
            'sku_number'    => $product->sku_number,
            'price'         => rand(1, 50) * 1000000,
            'description'   => Lorem::paragraph(3),
            'note'          => Lorem::paragraph(1),
            'brand_id'      => $product->brand_id,
            'author_id'     => $product->author_id,
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ];
    }
}
