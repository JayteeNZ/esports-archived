<?php

use Faker\Generator as Faker;

use Carbon\Carbon;

$factory->define(App\Ruleset::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'game_id' => 1,
        'content' => $faker->name
    ];
});