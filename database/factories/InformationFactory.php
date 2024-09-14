<?php

namespace Database\Factories;

use Database\Fakers\InformationFaker;
use Faker\Provider\Lorem;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Specification\Entities\Information;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class InformationFactory extends Factory
{
    protected $model = Information::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $information = new InformationFaker();

        return [
            'value'             => $information->value,
            'specification_id'  => $information->specification_id,
            'author_id'         => $information->author_id,
            'description'       => Lorem::paragraph(2),
            'created_at'        => now()->format('Y-m-d H:i:s'),
            'updated_at'        => now()->format('Y-m-d H:i:s'),
        ];
    }
}
