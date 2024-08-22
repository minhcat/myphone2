<?php

namespace Database\Factories;

use Database\Fakers\AddressFaker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Entities\Address;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AddressFactory extends Factory
{
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $addressfaker = new AddressFaker();

        return [
            'content'       => $addressfaker->content,
            'ward_id'       => $addressfaker->ward_id,
            'author_id'     => $addressfaker->author_id,
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s'),
        ];
    }
}
