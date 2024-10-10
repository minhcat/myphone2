<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Voucher\Entities\Voucher;
use Modules\Voucher\Entities\VoucherCode;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Voucher::truncate();

        Voucher::factory(10)->create();

        VoucherCode::truncate();

        VoucherCode::factory(100)->create();
    }
}
