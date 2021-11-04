<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeBattleDataAddField02 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('battle_data', function (Blueprint $table) {
            $table->string('legend')->nullable()->after('recording_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('battle_data', function (Blueprint $table) {
            $table->dropColumn('legend')->nullable();
        });
    }
}
