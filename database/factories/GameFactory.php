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

$factory->define(App\Game::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'display_name' => $faker->word,
        'slug' => $faker->slug(3),
        'identifier' => uniqid(true),
        'background_cover' => $faker->imageUrl(1920, 1080),
        'avatar_image' => $faker->imageUrl(1920, 1080),
        'meta_image' => $faker->imageUrl(400, 300),
        'visible' => rand(0, 2),
        'platform_id' => function () {
        	return factory(App\Platform::class)->create()->id;
        }
    ];
});