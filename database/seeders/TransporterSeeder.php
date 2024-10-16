<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Transporter\Entities\Transporter;
use Modules\Transporter\Entities\TransporterCase;

class TransporterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transporter::truncate();

        Transporter::factory(3)->create();

        TransporterCase::truncate();

        TransporterCase::factory(9)->create();
    }
}
