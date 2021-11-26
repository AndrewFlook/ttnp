<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLunchSpecialHoursToHours extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hours', function (Blueprint $table) {
            $table->string('ls_start')->nullable()->after('hh_end');
            $table->string('ls_end')->nullable()->after('ls_start');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hours', function (Blueprint $table) {
            $table->dropColumn(['ls_start', 'ls_end']);
        });
    }
}
