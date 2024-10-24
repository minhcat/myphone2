<?php

namespace Database\Factories;

use Database\Fakers\PermissionFaker;
use Faker\Provider\Lorem;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Permission\Entities\Permission;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PermissionFactory extends Factory
{
    protected $model = Permission::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $permission = new PermissionFaker();

        return [
            'name'          => $permission->name,
            'key'           => $permission->key,
            'table'         => $permission->table,
            'description'   => Lorem::paragraph(),
            'author_id'     => $permission->author_id,
            'created_at'    => now()->format('Y-m-d H:i:s'),
            'updated_at'    => now()->format('Y-m-d H:i:s')
        ];
    }
}
