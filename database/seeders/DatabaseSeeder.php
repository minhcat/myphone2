<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProductSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AttributeSeeder::class);
        $this->call(VariationSeeder::class);
        $this->call(SpecificationSeeder::class);
        $this->call(DetailSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(TagSeeder::class);
        $this->call(CartSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(InvoiceSeeder::class);
        $this->call(PromotionSeeder::class);
        $this->call(SaleSeeder::class);
        $this->call(VoucherSeeder::class);
        $this->call(GiftSeeder::class);
    }
}
