<?php

namespace Database\Seeders;

use App\Enums\Gender;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        $data = [
            [
                'account'       => 'minhcat',
                'firstname'     => 'Minh',
                'lastname'      => 'Cat',
                'gender'        => Gender::MALE,
                'job'           => 'web developer',
                'email'         => 'minh.cat@myphone.com',
                'password'      => bcrypt('123456'),
                'is_admin'      => true,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'account'       => 'binhnguyen',
                'firstname'     => 'Nguyen Van',
                'lastname'      => 'Binh',
                'gender'        => Gender::MALE,
                'job'           => 'web developer',
                'email'         => 'binh.nguyen@myphone.com',
                'password'      => bcrypt('123456'),
                'is_admin'      => true,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'account'       => 'yenle',
                'firstname'     => 'Le Thi',
                'lastname'      => 'Yen',
                'gender'        => Gender::FEMALE,
                'job'           => 'account',
                'email'         => 'yen.le@myphone.com',
                'password'      => bcrypt('123456'),
                'is_admin'      => false,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'account'       => 'thanhtran',
                'firstname'     => 'Tran Minh',
                'lastname'      => 'Thanh',
                'gender'        => Gender::MALE,
                'job'           => 'account',
                'email'         => 'thanh.tran@myphone.com',
                'password'      => bcrypt('123456'),
                'is_admin'      => false,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'account'       => 'quypham',
                'firstname'     => 'Pham Ngoc',
                'lastname'      => 'Quy',
                'gender'        => Gender::OTHER,
                'job'           => 'reviewer',
                'email'         => 'quy.pham@myphone.com',
                'password'      => bcrypt('123456'),
                'is_admin'      => false,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'account'       => 'huongdinh',
                'firstname'     => 'Đinh',
                'lastname'      => 'Hương',
                'gender'        => Gender::FEMALE,
                'job'           => 'customer',
                'email'         => 'huong.dinh@myphone.com',
                'password'      => bcrypt('123456'),
                'is_admin'      => false,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'account'       => 'thaohuynh',
                'firstname'     => 'Huỳnh Thị',
                'lastname'      => 'Thu Thảo',
                'gender'        => Gender::FEMALE,
                'job'           => 'customer',
                'email'         => 'thao.huynh@myphone.com',
                'password'      => bcrypt('123456'),
                'is_admin'      => false,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'account'       => 'nhungdinh',
                'firstname'     => 'Đinh Thị',
                'lastname'      => 'Phương Nhung',
                'gender'        => Gender::FEMALE,
                'job'           => 'customer',
                'email'         => 'nhung.dinh@myphone.com',
                'password'      => bcrypt('123456'),
                'is_admin'      => false,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'account'       => 'huynguyen',
                'firstname'     => 'Nguyễn',
                'lastname'      => 'Gia Huy',
                'gender'        => Gender::MALE,
                'job'           => 'customer',
                'email'         => 'huy.nguyen@myphone.com',
                'password'      => bcrypt('123456'),
                'is_admin'      => false,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'account'       => 'tiennguyen',
                'firstname'     => 'Nguyễn Dương',
                'lastname'      => 'Quế Tiên',
                'gender'        => Gender::FEMALE,
                'job'           => 'customer',
                'email'         => 'tien.nguyen@myphone.com',
                'password'      => bcrypt('123456'),
                'is_admin'      => false,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
        ];

        DB::table('users')->insert($data);

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
