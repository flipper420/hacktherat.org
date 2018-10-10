<?php

use Faker\Generator as Faker;

$factory->define(App\Models\CompletedMission::class, function (Faker $faker) {
	$userid = \App\Models\User::inRandomOrder()->first()->id;
    $mission = \App\Models\Mission::inRandomOrder()->first();
	$mission_id = $mission->id;
    $cat_id = $mission->category_id;
	$unique = $faker->unique()->regexify("^$userid-$cat_id-$mission_id-[a-zA-Z0-9]{5}");
	$all = explode('-', $unique);
    return [
        'user_id'    => $all[0],
        'category_id' => $all[1],
        'mission_id' => $all[2],
        'created_at' => $faker->dateTimeBetween('-3 years', 'now'),
    ];
});
