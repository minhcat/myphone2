<?php

namespace Database\Seeders;

use App\Enums\Gender;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\User\Entities\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        User::insert(config('seeder.user'));

        User::factory(20)->create();

        DB::table('addresses')->truncate();

        DB::table('addresses')->insert([
            [
                'content'       => '120 Phạm Văn Đồng',
                'ward_id'       => 23,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'content'       => '60 Chu Mạnh Trinh',
                'ward_id'       => 1,
                'author_id'     => 1,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'content'       => '110 Phạm Văn Đồng',
                'ward_id'       => 22,
                'author_id'     => 2,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'content'       => '50 Lê Duẫn',
                'ward_id'       => 2,
                'author_id'     => 2,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'content'       => '110 Đinh Bộ Lĩnh',
                'ward_id'       => 21,
                'author_id'     => 3,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'content'       => '50 Lê Lợi',
                'ward_id'       => 3,
                'author_id'     => 3,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'content'       => '100 Nguyễn Trãi',
                'ward_id'       => 20,
                'author_id'     => 4,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'content'       => '40 Trần Hưng Đạo',
                'ward_id'       => 4,
                'author_id'     => 4,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'content'       => '90 Quang Trung',
                'ward_id'       => 19,
                'author_id'     => 5,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'content'       => '30 Nguyễn Huệ',
                'ward_id'       => 5,
                'author_id'     => 5,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
