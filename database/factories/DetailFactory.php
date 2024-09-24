<?php

namespace Database\Factories;

use Database\Fakers\DetailFaker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Product\Entities\Detail;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DetailFactory extends Factory
{
    protected $model = Detail::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $detail = new DetailFaker();

        return [
            'product_id'        => $detail->product_id,
            'specification_id'  => $detail->specification_id,
            'information_id'    => $detail->information_id,
            'author_id'         => $detail->author_id,
            'created_at'        => now()->format('Y-m-d H:i:s'),
            'updated_at'        => now()->format('Y-m-d H:i:s'),
        ];
    }
}
