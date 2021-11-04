<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeBattleDataTableNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('battle_data', function (Blueprint $table) {
            $table->string('battle_mode')->nullable()->change();
            $table->string('map_name')->nullable()->change();
            $table->string('drop_zone')->nullable()->change();
            $table->string('final_zone')->nullable()->change();
            $table->integer('ranked')->nullable()->change();
            $table->integer('round')->nullable()->change();
            $table->string('weapon_first')->nullable()->change();
            $table->string('weapon_second')->nullable()->change();
            $table->integer('kill_count')->nullable()->change();
            $table->integer('damage_count')->nullable()->change();
            $table->string('free_memo',100)->nullable()->change();
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
            $table->string('battle_mode')->nullable(false)->change();
            $table->string('map_name')->nullable(false)->change();
            $table->string('drop_zone')->nullable(false)->change();
            $table->string('final_zone')->nullable(false)->change();
            $table->integer('ranked')->nullable(false)->change();
            $table->integer('round')->nullable(false)->change();
            $table->string('weapon_first')->nullable(false)->change();
            $table->string('weapon_second')->nullable(false)->change();
            $table->integer('kill_count')->nullable(false)->change();
            $table->integer('damage_count')->nullable(false)->change();
            $table->string('free_memo')->nullable(false)->change();
        });
    }
}
