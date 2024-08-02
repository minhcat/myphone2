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
        Schema::table('transport_fees', function (Blueprint $table) {
            $table->dropColumn('total_range_bottom_type');
            $table->dropColumn('total_range_bottom');
            $table->dropColumn('total_range_top_type');
            $table->dropColumn('total_range_top');
            $table->dropColumn('area_id');
            $table->dropColumn('transporter_case_id');
            $table->dropColumn('cost');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transport_fees', function (Blueprint $table) {
            $table->integer('total_range_bottom_type')->unsigned()->default(TotalRangeType::EQUAL);
            $table->integer('total_range_bottom')->unsigned()->default(0);
            $table->integer('total_range_top_type')->unsigned()->default(TotalRangeType::EQUAL);
            $table->integer('total_range_top')->unsigned()->nullable();
            $table->integer('area_id')->unsigned();
            $table->integer('transporter_case_id')->unsigned();
            $table->integer('cost')->unsigned();
        });
    }
};
