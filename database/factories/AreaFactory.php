<?php

namespace Database\Factories;

use Database\Fakers\AreaFaker;
use Faker\Provider\Lorem;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Area\Entities\Area;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AreaFactory extends Factory
{
    protected $model = Area::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $area = new AreaFaker();

        return [
            'name'          => $area->name,
            'description'   => Lorem::paragraph(3),
            'author_id'     => $area->author_id,
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ];
    }
}
