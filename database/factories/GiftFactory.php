<?php

namespace Database\Factories;

use Database\Fakers\GiftFaker;
use Faker\Provider\Lorem;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Gift\Entities\Gift;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class GiftFactory extends Factory
{
    protected $model = Gift::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gift = new GiftFaker();

        return [
            'name'              => $gift->name,
            'description'       => Lorem::paragraph(3),
            'status'            => $gift->status,
            'author_id'         => $gift->author_id,
            'start_datetime'    => $gift->start_datetime,
            'end_datetime'      => $gift->end_datetime,
            'created_at'        => now()->format('Y-m-d H:i:s'),
            'updated_at'        => now()->format('Y-m-d H:i:s'),
        ];
    }
}
