<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->integer('subtotal')->nullable()->after('address_id');
            $table->integer('transport_fee')->nullable()->after('subtotal');
            $table->integer('discount')->nullable()->after('transport_fee');
            $table->integer('tax')->nullable()->after('discount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn('subtotal');
            $table->dropColumn('transport_fee');
            $table->dropColumn('discount');
            $table->dropColumn('tax');
        });
    }
};
