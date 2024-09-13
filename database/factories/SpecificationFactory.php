<?php

namespace Database\Factories;

use Database\Fakers\SpecificationFaker;
use Faker\Provider\Lorem;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Specification\Entities\Specification;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SpecificationFactory extends Factory
{
    protected $model = Specification::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $specification = new SpecificationFaker();

        return [
            'name'          => $specification->name,
            'description'   => Lorem::paragraph(3),
            'author_id'     => $specification->author_id,
            'note'          => Lorem::paragraph(1),
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ];
    }
}
