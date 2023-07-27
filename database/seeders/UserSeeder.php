<?php

namespace Database\Seeders;

use App\Enums\Gender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'name'          => 'minhcat',
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
                'name'          => 'binhnguyen',
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
                'name'          => 'yenle',
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
                'name'          => 'thanhtran',
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
                'name'          => 'quypham',
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
        ];

        DB::table('users')->insert($data);
    }
}
