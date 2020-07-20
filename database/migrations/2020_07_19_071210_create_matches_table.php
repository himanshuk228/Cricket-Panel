<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('match_id');
            $table->integer('team1_id')->unsigned();
            $table->integer('team2_id')->unsigned();
            $table->integer('match_status')->unsigned()->comment('1 for resulted,2 for tie,3 for cancelled');
            $table->integer('winner_id')->nullable();
            $table->foreign('team1_id')->references('team_id')->on('teams');
            $table->foreign('team2_id')->references('team_id')->on('teams');
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
        Schema::dropIfExists('matches');
    }
}
