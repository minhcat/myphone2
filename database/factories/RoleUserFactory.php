<?php

namespace Database\Factories;

use Database\Fakers\RoleUserFaker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Role\Entities\RoleUser;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RoleUserFactory extends Factory
{
    protected $model = RoleUser::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $role_user = new RoleUserFaker();

        return [
            'role_id'   => $role_user->role_id,
            'user_id'   => $role_user->user_id
        ];
    }
}
