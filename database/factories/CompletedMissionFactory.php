<?php

use Faker\Generator as Faker;

$factory->define(App\Models\CompletedMission::class, function (Faker $faker) {
	$userid = \App\Models\User::inRandomOrder()->first()->id;
	$cat_id = \App\Models\Category::inRandomOrder()->where('type', 'Mission')->first()->id;
	$mission_id = \App\Models\Mission::inRandomOrder()->first()->id;
	$unique = $faker->unique()->regexify("^$userid-$cat_id-$mission_id");
	$all = explode('-', $unique);
    return [
        'user_id'    => $all[0],
        'category_id' => $all[1],
        'mission_id' => $all[2],
        'created_at' => $faker->dateTimeBetween('-3 years', 'now'),
        'updated_at' => $faker->dateTimeBetween('-3 years', 'now'),
    ];
});
