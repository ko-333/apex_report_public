<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BattleData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('battle_data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('user_name');
            $table->dateTime('recording_date');
            $table->string('map_name');
            $table->string('drop_zone');
            $table->string('final_zone');
            $table->integer('ranked');
            $table->integer('round');
            $table->string('weapon_first');
            $table->string('weapon_second');
            $table->integer('kill_count');
            $table->integer('damage_count');
            $table->string('free_memo');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('battle_data');
    }
}
