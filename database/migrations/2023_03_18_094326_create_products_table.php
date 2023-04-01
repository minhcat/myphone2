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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('');
            $table->string('slug')->default('');
            $table->string('sku_prefix')->default('');
            $table->string('sku_number')->default('');
            $table->float('price', 12, 2)->default(0);
            $table->text('description')->default('');
            $table->string('note')->default('');
            $table->integer('brand_id')->unsigned()->nullable();
            $table->boolean('has_attribute')->default(false);
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
        Schema::dropIfExists('products');
    }
};
