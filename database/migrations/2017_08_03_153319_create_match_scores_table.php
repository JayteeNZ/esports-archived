<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('match_scores', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('match_id');
            $table->unsignedInteger('team_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('score');
            $table->unsignedInteger('opposition_score');
            $table->foreign('match_id')->references('id')->on('matches')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('team_id')->references('id')->on('teams')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('match_scores');
    }
}
