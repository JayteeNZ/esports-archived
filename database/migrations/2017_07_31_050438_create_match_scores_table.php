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
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('team_one_score');
            $table->unsignedInteger('team_two_score');
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
