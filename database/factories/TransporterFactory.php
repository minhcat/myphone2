<?php

namespace Database\Factories;

use Database\Fakers\TransporterFaker;
use Faker\Provider\Lorem;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Transporter\Entities\Transporter;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TransporterFactory extends Factory
{
    protected $model = Transporter::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $transporter = new TransporterFaker();

        return [
            'name'          => $transporter->name,
            'description'   => Lorem::paragraph(),
            'author_id'     => $transporter->author_id,
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ];
    }
}
