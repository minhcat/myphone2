<?php

namespace Database\Factories;

use Database\Fakers\ProductTagFaker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Tag\Entities\ProductTag;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductTagFactory extends Factory
{
    protected $model = ProductTag::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $product_tag = new ProductTagFaker();

        return [
            'product_id'    => $product_tag->product_id,
            'tag_id'        => $product_tag->tag_id,
        ];
    }
}
