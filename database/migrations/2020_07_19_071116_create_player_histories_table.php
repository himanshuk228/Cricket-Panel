<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayerHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('player_id');
            $table->integer('matches')->default(0)->unsigned();
            $table->integer('runs')->default(0)->unsigned();
            $table->integer('highest_score')->default(0)->unsigned();
            $table->integer('fifties')->default(0)->unsigned();
            $table->integer('hundreds')->default(0)->unsigned();
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
        Schema::dropIfExists('player_histories');
    }
}
