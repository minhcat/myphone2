<?php

namespace Database\Factories;

use Database\Fakers\WardFaker;
use Faker\Provider\Lorem;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\City\Entities\Ward;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class WardFactory extends Factory
{
    protected $model = Ward::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $ward = new WardFaker();

        return [
            'name'          => $ward->name,
            'shortname'     => $ward->shortname,
            'description'   => Lorem::paragraph(),
            'district_id'   => $ward->district_id,
            'author_id'     => $ward->author_id,
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ];
    }
}
