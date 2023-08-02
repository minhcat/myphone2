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
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('name', 'account');
            $table->string('firstname')->after('name');
            $table->string('lastname')->after('firstname');
            $table->tinyInteger('gender')->default(0)->after('lastname');
            $table->string('job')->nullable()->after('gender');
            $table->boolean('is_admin')->default(false)->after('remember_token');
            $table->string('password')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('account', 'name');
            $table->dropColumn('firstname');
            $table->dropColumn('lastname');
            $table->dropColumn('job');
            $table->dropColumn('gender');
            $table->dropColumn('is_admin');
            $table->string('password')->nullable(false)->change();
        });
    }
};
