<?php

namespace Database\Factories;

use Database\Fakers\AreaDetailFaker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Area\Entities\AreaDetail;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AreaDetailFactory extends Factory
{
    protected $model = AreaDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $area_detail = new AreaDetailFaker();

        return [
            'territory_type'    => $area_detail->territory_type,
            'territory_id'      => $area_detail->territory_id,
            'area_id'           => $area_detail->area_id,
            'author_id'         => $area_detail->author_id,
            'created_at'        => now()->format('Y-m-d H:i:s'),
            'updated_at'        => now()->format('Y-m-d H:i:s'),
        ];
    }
}
