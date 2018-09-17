<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
$factory->define(App\Models\Mission::class, function (Faker $faker) {
	$name = $faker->unique()->word;
	$catid = $faker->numberBetween(1, 9);
	$catname = DB::table('categories')->where('id', $catid)->value('slug');
	return [
        'category_id' => \App\Models\Category::inRandomOrder()->where('type', 'Mission')->first()->id,
		'name'        => $name,
		'description' => $faker->paragraph,
	    'slug'        => str_slug($name),
		'difficulty'  => $faker->randomElement(['easy', 'normal', 'hard', 'insane']),
		'url'		  => 'http://missions.htr.dev/'.$catname.'/'.str_slug($name),
		'img_url'     => $faker->imageUrl(300, 300),
		'reward'      => $faker->numberBetween(100, 1000),
		'password'    => $faker->word,
	];
});