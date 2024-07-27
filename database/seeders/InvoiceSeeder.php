<?php

namespace Database\Seeders;

use App\Enums\TargetType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('invoices')->truncate();

        DB::table('invoices')->insert([
            [
                'code'                  => '#1234',
                'author_id'             => 1,
                'address_id'            => 1,
                'transporter_case_id'   => 1,
                'subtotal'              => 165000000,
                'transport_fee'         => 20000,
                'discount'              => 500000,
                'tax'                   => 16450000,
                'total'                 => 180970000,
                'note'                  => 'invoice',
                'created_at'            => now()->format('Y-m-d H:i:s'),
                'updated_at'            => now()->format('Y-m-d H:i:s'),
            ],
            [
                'code'                  => '#2345',
                'author_id'             => 2,
                'address_id'            => 1,
                'transporter_case_id'   => 1,
                'subtotal'              => 47000000,
                'transport_fee'         => 20000,
                'discount'              => 300000,
                'tax'                   => 4670000,
                'total'                 => 51390000,
                'note'                  => 'invoice',
                'created_at'            => now()->format('Y-m-d H:i:s'),
                'updated_at'            => now()->format('Y-m-d H:i:s'),
            ],
            [
                'code'                  => '#3456',
                'author_id'             => 3,
                'address_id'            => 1,
                'transporter_case_id'   => 1,
                'subtotal'              => 62000000,
                'transport_fee'         => 30000,
                'discount'              => 400000,
                'tax'                   => 6160000,
                'total'                 => 68190000,
                'note'                  => 'invoice',
                'created_at'            => now()->format('Y-m-d H:i:s'),
                'updated_at'            => now()->format('Y-m-d H:i:s'),
            ],
            [
                'code'                  => '#4567',
                'author_id'             => 4,
                'address_id'            => 1,
                'transporter_case_id'   => 1,
                'subtotal'              => 22000000,
                'transport_fee'         => 30000,
                'discount'              => 600000,
                'tax'                   => 2140000,
                'total'                 => 23570000,
                'note'                  => 'invoice',
                'created_at'            => now()->format('Y-m-d H:i:s'),
                'updated_at'            => now()->format('Y-m-d H:i:s'),
            ],
            [
                'code'                  => '#5678',
                'author_id'             => 5,
                'address_id'            => 1,
                'transporter_case_id'   => 1,
                'subtotal'              => 17000000,
                'transport_fee'         => 30000,
                'discount'              => 800000,
                'tax'                   => 1620000,
                'total'                 => 17850000,
                'note'                  => 'invoice',
                'created_at'            => now()->format('Y-m-d H:i:s'),
                'updated_at'            => now()->format('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('invoice_details')->truncate();

        DB::table('invoice_details')->insert([
            // invoice 1
            [
                'invoice_id'    => 1,
                'target_type'   => TargetType::PRODUCT,
                'target_id'     => 1,
                'price'         => 45000000,
                'quantity'      => 1,
            ],
            [
                'invoice_id'    => 1,
                'target_type'   => TargetType::PRODUCT,
                'target_id'     => 2,
                'price'         => 42000000,
                'quantity'      => 2,
            ],
            [
                'invoice_id'    => 1,
                'target_type'   => TargetType::PRODUCT,
                'target_id'     => 3,
                'price'         => 36000000,
                'quantity'      => 1,
            ],
            // invoice 2
            [
                'invoice_id'    => 2,
                'target_type'   => TargetType::PRODUCT,
                'target_id'     => 4,
                'price'         => 32000000,
                'quantity'      => 1,
            ],
            [
                'invoice_id'    => 2,
                'target_type'   => TargetType::PRODUCT,
                'target_id'     => 5,
                'price'         => 8000000,
                'quantity'      => 1,
            ],
            [
                'invoice_id'    => 2,
                'target_type'   => TargetType::PRODUCT,
                'target_id'     => 6,
                'price'         => 7000000,
                'quantity'      => 1,
            ],
            // invoice 3
            [
                'invoice_id'    => 3,
                'target_type'   => TargetType::PRODUCT,
                'target_id'     => 7,
                'price'         => 6000000,
                'quantity'      => 2,
            ],
            [
                'invoice_id'    => 3,
                'target_type'   => TargetType::PRODUCT,
                'target_id'     => 8,
                'price'         => 5000000,
                'quantity'      => 2,
            ],
            [
                'invoice_id'    => 3,
                'target_type'   => TargetType::PRODUCT,
                'target_id'     => 9,
                'price'         => 20000000,
                'quantity'      => 2,
            ],
            // invoice 4
            [
                'invoice_id'    => 4,
                'target_type'   => TargetType::PRODUCT,
                'target_id'     => 7,
                'price'         => 6000000,
                'quantity'      => 2,
            ],
            [
                'invoice_id'    => 4,
                'target_type'   => TargetType::PRODUCT,
                'target_id'     => 8,
                'price'         => 5000000,
                'quantity'      => 2,
            ],
            // invoice 5
            [
                'invoice_id'    => 5,
                'target_type'   => TargetType::PRODUCT,
                'target_id'     => 7,
                'price'         => 6000000,
                'quantity'      => 2,
            ],
            [
                'invoice_id'    => 5,
                'target_type'   => TargetType::PRODUCT,
                'target_id'     => 8,
                'price'         => 5000000,
                'quantity'      => 1,
            ],
        ]);
    }
}
