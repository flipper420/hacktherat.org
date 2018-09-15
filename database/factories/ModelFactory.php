<?php

use jeremykenedy\LaravelRoles\Models\Role;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/* @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;
    $userRole = Role::whereName('User')->first();

    return [
        'username'                       => $faker->unique()->userName,
        'first_name'                     => $faker->firstName,
        'last_name'                      => $faker->lastName,
        'email'                          => $faker->unique()->safeEmail,
        'password'                       => $password ?: $password = bcrypt('secret'),
        'token'                          => str_random(64),
        'activated'                      => true,
        'remember_token'                 => str_random(10),
        'signup_ip_address'              => $faker->ipv4,
        'signup_confirmation_ip_address' => $faker->ipv4,
    ];
});

$factory->define(App\Models\Profile::class, function (Faker\Generator $faker) {
    return [
        'user_id'          => factory(App\Models\User::class)->create()->id,
        'theme_id'         => 1,
        'location'         => $faker->streetAddress,
        'bio'              => $faker->paragraph(2, true),
        'url'              => $faker->url,
        'phone'            => $faker->phoneNumber,
        'mobile'           => $faker->phoneNumber,
        'date_of_birth'    => $faker->date('Y-m-d', 'now'),
        'gender'           => $faker->randomElement(['male' ,'female', 'unspecified']),
        'twitter'          => $faker->userName,
        'facebook'         => $faker->userName,
        'googleplus'       => $faker->userName,
        'linkedin'         => $faker->userName,
        'github'           => $faker->userName,
        'avatar'           => $faker->imageUrl(),
    ];
});

$factory->define(App\Models\Point::class, function (Faker\Generator $faker) {
    return [
        'user_id'   => factory(App\Models\Profile::class)->create()->user_id,
        'points'    => $faker->numberBetween(100, 10000),
        'reason'    => 'testing',
        'direction' => $faker->randomElement(['add', 'sub']),
    ];
});
