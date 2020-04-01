<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'id' => $faker->lexify("????????"),
        'username' => $faker->userName,
        'name' => $faker->name,
        'date_of_birth' => $faker-> date(),//dateTimeBetween('1920-01-01', '2006-12-31')
        'email' => $faker->unique()->safeEmail,
        'gender' => $faker->numberBetween(0,1),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'user_auth' => $faker->numberBetween(0,1),
        'billing' => $faker->numberBetween(0,100),
        'shipping' => $faker->numberBetween(0,100),
    ];
});
