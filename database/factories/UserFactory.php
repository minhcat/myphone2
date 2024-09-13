<?php

namespace Database\Factories;

use Database\Fakers\UserFaker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Entities\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = new UserFaker();

        return [
            'account'           => $user->account,
            'firstname'         => $user->firstname,
            'lastname'          => $user->lastname,
            'gender'            => $user->gender,
            'job'               => $user->job,
            'email'             => $user->email,
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
