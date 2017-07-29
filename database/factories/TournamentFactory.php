<?php

use Faker\Generator as Faker;

use App\Platform;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Tournament::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'visibility' => 2,
        'min_teams' => 2,
        'max_teams' => 4,
        'players' => rand(1, 5),
        'subs' => rand(0, 2),
        'platform_id' => rand(1, 2),
        'ruleset_id' => 1,
        'game_id' => 1,
        'rounds' => 3,
        'starts_at' => function () {
            $day = rand(1, 100);
            return Carbon::now()->addDays($day);
        }
    ];
});