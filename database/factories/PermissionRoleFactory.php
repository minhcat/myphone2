<?php

namespace Database\Factories;

use Database\Fakers\PermissionRoleFaker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Permission\Entities\PermissionRole;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PermissionRoleFactory extends Factory
{
    protected $model = PermissionRole::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $permission_role = new PermissionRoleFaker();

        return [
            'permission_id' => $permission_role->permission_id,
            'role_id'       => $permission_role->role_id
        ];
    }
}
