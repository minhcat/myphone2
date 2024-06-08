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
        Schema::create('discount_forms', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->integer('author_id')->unsigned()->default(0);
            $table->text('description')->default('');
            $table->integer('target_type')->unsigned()->default(0);
            $table->integer('discount_type')->unsigned()->default(0);
            $table->integer('discount_value')->unsigned()->default(0);
            $table->integer('discount_minimum')->unsigned()->nullable();
            $table->integer('discount_maximum')->unsigned()->nullable();
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
        Schema::dropIfExists('discount_forms');
    }
};
