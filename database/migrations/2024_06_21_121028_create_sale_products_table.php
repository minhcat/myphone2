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
        Schema::create('sale_products', function (Blueprint $table) {
            $table->id();
            $table->integer('target_type')->unsigned();
            $table->integer('target_id')->unsigned();
            $table->integer('sale_id')->unsigned();
            $table->integer('discount_type')->unsigned()->nullable();
            $table->integer('discount_value')->unsigned()->nullable();
            $table->integer('discount_minimum')->unsigned()->nullable();
            $table->integer('discount_maximum')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_products');
    }
};
