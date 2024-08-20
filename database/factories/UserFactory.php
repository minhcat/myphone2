<?php

namespace Database\Factories;

use App\Enums\Gender;
use App\Faker\UserFaker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $userfaker = new UserFaker();

        return [
            'account'           => $userfaker->account,
            'firstname'         => $userfaker->firstname,
            'lastname'          => $userfaker->lastname,
            'gender'            => $userfaker->gender,
            'job'               => $userfaker->job,
            'email'             => $userfaker->email,
            'password'          => bcrypt('123456'),
            'is_admin'          => true,
            'remember_token'    => null,
            'created_at'        => now()->format('Y-m-d H:i:s'),
            'updated_at'        => now()->format('Y-m-d H:i:s'),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
