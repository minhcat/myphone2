<?php

namespace Database\Factories;

use Database\Fakers\VoucherCodeFaker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Voucher\Entities\VoucherCode;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VoucherCodeFactory extends Factory
{
    protected $model = VoucherCode::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $voucher_code = new VoucherCodeFaker();

        return [
            'code'              => $voucher_code->code,
            'voucher_id'        => $voucher_code->voucher_id,
            'quantity'          => $voucher_code->quantity,
            'discount_type'     => $voucher_code->discount_type,
            'discount_value'    => $voucher_code->discount_value,
            'discount_minimum'  => $voucher_code->discount_minimum,
            'discount_maximum'  => $voucher_code->discount_maximum,
        ];
    }
}
