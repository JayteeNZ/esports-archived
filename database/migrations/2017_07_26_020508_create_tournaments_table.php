<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournaments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('status')->default(0);
            $table->boolean('registration_status')->default(true);
            $table->integer('visibility')->default(2);
            $table->unsignedInteger('min_teams')->default(2);
            $table->unsignedInteger('max_teams')->nullable();
            $table->unsignedInteger('players');
            $table->unsignedInteger('subs')->default(0);
            $table->unsignedInteger('platform_id');
            $table->unsignedInteger('game_id');
            $table->unsignedInteger('ruleset_id');
            $table->unsignedInteger('teams_per_bracket')->default(16);
            $table->dateTime('starts_at');
            $table->dateTime('finished')->nullable();
            $table->enum('format', ['single elimination', 'double elimination', 'round robin'])->default('single elimination');
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
        Schema::dropIfExists('tournaments');
    }
}
