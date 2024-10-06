<?php

namespace Database\Seeders;

use App\Enums\TargetType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Invoice\Entities\Invoice;
use Modules\Invoice\Entities\InvoiceDetail;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Invoice::truncate();

        Invoice::factory(100)->create();

        InvoiceDetail::truncate();

        InvoiceDetail::factory(300)->create();

        Invoice::updateSubTotalBulk();
    }
}
