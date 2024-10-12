<?php

namespace Database\Factories;

use Database\Fakers\DistrictFaker;
use Faker\Provider\Lorem;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\City\Entities\District;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DistrictFactory extends Factory
{
    protected $model = District::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $district = new DistrictFaker();

        return [
            'name'          => $district->name,
            'shortname'     => $district->shortname,
            'description'   => Lorem::paragraph(),
            'city_id'       => $district->city_id,
            'author_id'     => $district->author_id,
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ];
    }
}
