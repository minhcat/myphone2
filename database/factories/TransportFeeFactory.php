<?php

namespace Database\Factories;

use Database\Fakers\TransportFeeFaker;
use Faker\Provider\Lorem;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\TransportFee\Entities\TransportFee;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TransportFeeFactory extends Factory
{
    protected $model = TransportFee::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $transport_fee = new TransportFeeFaker();

        return [
            'name'                      => $transport_fee->name,
            'description'               => Lorem::paragraph(),
            'author_id'                 => $transport_fee->author_id,
            'area_id'                   => $transport_fee->area_id,
            'transporter_case_id'       => $transport_fee->transporter_case_id,
            'total_range_bottom_type'   => $transport_fee->total_range_bottom_type,
            'total_range_bottom'        => $transport_fee->total_range_bottom,
            'total_range_top_type'      => $transport_fee->total_range_top_type,
            'total_range_top'           => $transport_fee->total_range_top,
            'cost'                      => $transport_fee->cost,
            'created_at'                => now()->format('Y-m-d H:i:s'),
            'updated_at'                => now()->format('Y-m-d H:i:s'),
        ];
    }
}
