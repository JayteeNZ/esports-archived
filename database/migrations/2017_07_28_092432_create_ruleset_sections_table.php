<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRulesetSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ruleset_sections', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ruleset_id');
            $table->string('title');
            $table->text('content');
            $table->foreign('ruleset_id')->references('id')->on('rulesets')
                ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('ruleset_sections');
    }
}
