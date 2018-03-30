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
            $table->increments('id');
            $table->unsignedInteger('challonge_id');
            $table->unsignedInteger('tournament_id');
            $table->unsignedInteger('challonge_tournament_id');
            $table->unsignedInteger('round');
            $table->unsignedInteger('status');
            $table->string('identifier');
            $table->foreign('tournament_id')->references('id')->on('tournaments')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->dateTime('started_at')->nullable();
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
