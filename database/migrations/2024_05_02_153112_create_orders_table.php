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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->integer('user_id')->unsigned();
            $table->integer('address_id')->unsigned()->nullable();
            $table->boolean('is_pending')->default(true);
            $table->boolean('is_approved')->default(false);
            $table->boolean('is_shipping')->default(false);
            $table->boolean('is_completed')->default(false);
            $table->string('note')->default('');
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
        Schema::dropIfExists('orders');
    }
};
