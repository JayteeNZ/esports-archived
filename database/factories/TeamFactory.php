<?php

use Faker\Generator as Faker;

use Carbon\Carbon;

$factory->define(App\Team::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'tournament_id' => 1,
    ];
});