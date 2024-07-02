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
        Schema::create('gift_product_items', function (Blueprint $table) {
            $table->id();
            $table->integer('target_type')->unsigned();
            $table->integer('target_id')->unsigned();
            $table->integer('gift_product_id')->unsigned();
            $table->integer('quantity')->unsigned();
            $table->integer('author_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gift_product_items');
    }
};
