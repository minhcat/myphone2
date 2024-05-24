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
                'job'           => '',
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
                'job'           => '',
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
                'job'           => '',
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
                'job'           => '',
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
                'job'           => '',
                'email'         => 'tien.nguyen@myphone.com',
                'password'      => bcrypt('123456'),
                'is_admin'      => false,
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
        ];

        DB::table('users')->insert($data);
    }
}
