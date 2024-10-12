<?php

namespace Database\Factories;

use Database\Fakers\CityFaker;
use Faker\Provider\Lorem;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\City\Entities\City;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CityFactory extends Factory
{
    protected $model = City::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $city = new CityFaker();

        return [
            'name'          => $city->name,
            'shortname'     => $city->shortname,
            'description'   => Lorem::paragraph(3),
            'author_id'     => $city->author_id,
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ];
    }
}
