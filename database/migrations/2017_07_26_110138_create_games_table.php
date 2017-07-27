<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('display_name');
            $table->string('slug');
            $table->string('identifier')->unique();
            $table->string('background_cover')->nullable();
            $table->string('avatar_image')->nullable();
            $table->string('meta_image')->nullable();
            $table->boolean('visible')->default(false);
            $table->unsignedInteger('platform_id');
            $table->foreign('platform_id')->references('id')->on('platforms')
                ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('games');
    }
}
