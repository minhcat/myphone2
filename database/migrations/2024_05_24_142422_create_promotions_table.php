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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('status')->unsigned()->default(0);
            $table->integer('author_id')->unsigned()->default(0);
            $table->integer('condition_type')->unsigned()->default(0);
            $table->integer('condition_value')->unsigned()->default(0);
            $table->integer('discount_target')->unsigned()->default(0);
            $table->integer('discount_type')->unsigned()->default(0);
            $table->integer('discount_value')->unsigned()->default(0);
            $table->integer('discount_minimum')->unsigned()->nullable();
            $table->integer('discount_maximum')->unsigned()->nullable();
            $table->dateTime('start_datetime')->nullable();
            $table->dateTime('end_datetime')->nullable();
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
        Schema::dropIfExists('promotions');
    }
};
