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
        Schema::create('condition_targets', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->integer('condition_id')->unsigned();
            $table->integer('parent_id')->unsigned()->nullable();
            $table->integer('target_type')->unsigned()->nullable();     // target null là dạng nhóm sp đi kèm: target là 1 list
            $table->integer('target_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('condition_targets');
    }
};