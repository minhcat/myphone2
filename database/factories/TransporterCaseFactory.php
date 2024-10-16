<?php

namespace Database\Factories;

use Database\Fakers\TransporterCaseFaker;
use Faker\Provider\Lorem;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Transporter\Entities\TransporterCase;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TransporterCaseFactory extends Factory
{
    protected $model = TransporterCase::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $transporter_case = new TransporterCaseFaker();

        return [
            'name'                  => $transporter_case->name,
            'description'           => Lorem::paragraph(),
            'transporter_id'        => $transporter_case->transporter_id,
            'author_id'             => $transporter_case->author_id,
            'estimate_time_type'    => $transporter_case->estimate_time_type,
            'estimate_time'         => $transporter_case->estimate_time,
            'created_at'            => now()->format('Y-m-d H:i:s'),
            'updated_at'            => now()->format('Y-m-d H:i:s'),
        ];
    }
}
