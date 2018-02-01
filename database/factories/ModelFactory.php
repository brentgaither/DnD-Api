<?php

use Faker\Generator as Faker;
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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Item::class, function (Faker $faker) {
    return [
        'id' => $faker->numberBetween($min = 1000, $max = 200000),
        'name' => $faker->word,
        'description' => $faker->sentence,
        'weight' => $faker->numberBetween($min = 1, $max = 30),
    ];
});

$factory->define(App\Models\Wallet::class, function (Faker $faker) {
    return [
        'id' => $faker->numberBetween($min = 1000, $max = 200000),
        'gold' => $faker->numberBetween($min = 1, $max = 30),
        'silver' => $faker->numberBetween($min = 1, $max = 30),
        'copper' => $faker->numberBetween($min = 1, $max = 30),
    ];
});
