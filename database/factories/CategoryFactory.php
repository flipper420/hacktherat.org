<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Category::class, function (Faker $faker) {
	$name = $faker->word;
    return [
        'name' => $name,
        'desc' => $faker->paragraph,
        'slug' => strtolower($name),
        'type' => $faker->randomElement(['Mission', 'Library']),
    ];
});
