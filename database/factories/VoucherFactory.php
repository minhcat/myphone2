<?php

namespace Database\Factories;

use Database\Fakers\VoucherFaker;
use Faker\Provider\Lorem;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Voucher\Entities\Voucher;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VoucherFactory extends Factory
{
    protected $model = Voucher::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $voucher = new VoucherFaker();

        return [
            'name'              => $voucher->name,
            'status'            => $voucher->status,
            'description'       => Lorem::paragraph(3),
            'author_id'         => $voucher->author_id,
            'discount_target'   => $voucher->discount_target,
            'discount_type'     => $voucher->discount_type,
            'discount_value'    => $voucher->discount_value,
            'discount_minimum'  => $voucher->discount_minimum,
            'discount_maximum'  => $voucher->discount_maximum,
            'start_datetime'    => $voucher->start_datetime,
            'end_datetime'      => $voucher->end_datetime,
            'created_at'        => now()->format('Y-m-d H:i:s'),
            'updated_at'        => now()->format('Y-m-d H:i:s'),
        ];
    }
}
