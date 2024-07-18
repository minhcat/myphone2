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
        Schema::table('cart_details', function(Blueprint $table) {
            $table->dropColumn('product_id');
            $table->integer('target_type')->unsigned()->after('cart_id');
            $table->integer('target_id')->unsigned()->after('target_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cart_details', function(Blueprint $table) {
            $table->integer('product_id')->unsigned()->after('cart_id');
            $table->dropColumn('target_type');
            $table->dropColumn('target_id');
        });
    }
};