<?php

namespace Database\Seeders;

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
                'code'          => '#1234',
                'user_id'       => 1,
                'address_id'    => 1,
                'total'         => 165000000,
                'note'          => 'invoice',
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'code'          => '#2345',
                'user_id'       => 2,
                'address_id'    => 1,
                'total'         => 47000000,
                'note'          => 'invoice',
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'code'          => '#3456',
                'user_id'       => 3,
                'address_id'    => 1,
                'total'         => 62000000,
                'note'          => 'invoice',
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'code'          => '#4567',
                'user_id'       => 4,
                'address_id'    => 1,
                'total'         => 22000000,
                'note'          => 'invoice',
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
            [
                'code'          => '#5678',
                'user_id'       => 5,
                'address_id'    => 1,
                'total'         => 17000000,
                'note'          => 'invoice',
                'created_at'    => now()->format('Y-m-d H:i:s'),
                'updated_at'    => now()->format('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('invoice_details')->truncate();

        DB::table('invoice_details')->insert([
            // invoice 1
            [
                'invoice_id'    => 1,
                'product_id'    => 1,
                'price'         => 45000000,
                'quantity'      => 1,
            ],
            [
                'invoice_id'    => 1,
                'product_id'    => 2,
                'price'         => 42000000,
                'quantity'      => 2,
            ],
            [
                'invoice_id'    => 1,
                'product_id'    => 3,
                'price'         => 36000000,
                'quantity'      => 1,
            ],
            // invoice 2
            [
                'invoice_id'    => 2,
                'product_id'    => 4,
                'price'         => 32000000,
                'quantity'      => 1,
            ],
            [
                'invoice_id'    => 2,
                'product_id'    => 5,
                'price'         => 8000000,
                'quantity'      => 1,
            ],
            [
                'invoice_id'    => 2,
                'product_id'    => 6,
                'price'         => 7000000,
                'quantity'      => 1,
            ],
            // invoice 3
            [
                'invoice_id'    => 3,
                'product_id'    => 7,
                'price'         => 6000000,
                'quantity'      => 2,
            ],
            [
                'invoice_id'    => 3,
                'product_id'    => 8,
                'price'         => 5000000,
                'quantity'      => 2,
            ],
            [
                'invoice_id'    => 3,
                'product_id'    => 9,
                'price'         => 20000000,
                'quantity'      => 2,
            ],
            // invoice 4
            [
                'invoice_id'    => 4,
                'product_id'    => 7,
                'price'         => 6000000,
                'quantity'      => 2,
            ],
            [
                'invoice_id'    => 4,
                'product_id'    => 8,
                'price'         => 5000000,
                'quantity'      => 2,
            ],
            // invoice 5
            [
                'invoice_id'    => 5,
                'product_id'    => 7,
                'price'         => 6000000,
                'quantity'      => 2,
            ],
            [
                'invoice_id'    => 5,
                'product_id'    => 8,
                'price'         => 5000000,
                'quantity'      => 1,
            ],
        ]);
    }
}
