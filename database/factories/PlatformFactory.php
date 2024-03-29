<?php

use Faker\Generator as Faker;

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

$factory->define(App\Platform::class, function (Faker $faker) {
	$name = $faker->name;
    return [
        'name' => $name,
        'display_name' => strtoupper($name),
        'slug' => str_slug(strtolower($name)),
        'visible' => $faker->boolean
    ];
});
