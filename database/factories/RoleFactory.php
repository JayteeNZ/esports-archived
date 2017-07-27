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

$factory->define(App\Authorization\Role::class, function (Faker $faker) {
    return [
        'name' => $faker->slug(3),
        'display_name' => $faker->word,
        'description' => $faker->sentence(8)
    ];
});

$factory->state(App\Authorization\Role::class, 'member', [
	'name' => 'member',
	'display_name' => 'Member',
]);