<?php

use App\Enums\TotalRangeType;
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
        Schema::create('transport_fees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('total_range_bottom_type')->unsigned()->default(TotalRangeType::EQUAL);
            $table->integer('total_range_bottom')->unsigned()->default(0);
            $table->integer('total_range_top_type')->unsigned()->default(TotalRangeType::EQUAL);
            $table->integer('total_range_top')->unsigned()->nullable();
            $table->integer('area_id')->unsigned();
            $table->integer('transporter_case_id')->unsigned();
            $table->integer('cost')->unsigned();
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
        Schema::dropIfExists('transport_fees');
    }
};
