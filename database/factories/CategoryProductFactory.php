<?php

namespace Database\Factories;

use Database\Fakers\CategoryProductFaker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Category\Entities\CategoryProduct;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategoryProductFactory extends Factory
{
    protected $model = CategoryProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $category_product = new CategoryProductFaker();

        return [
            'category_id'   => $category_product->category_id,
            'product_id'    => $category_product->product_id,
        ];
    }
}
