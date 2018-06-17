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

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('admin'), // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Item::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
        'weight' => $faker->numberBetween($min = 1, $max = 30),
    ];
});

$factory->define(App\Models\Wallet::class, function (Faker $faker) {
    return [
        'gold' => $faker->numberBetween($min = 1, $max = 30),
        'silver' => $faker->numberBetween($min = 1, $max = 30),
        'copper' => $faker->numberBetween($min = 1, $max = 30),
        'user_id' => factory(App\Models\User::class)->create()->id
    ];
});

$factory->define(App\Models\UserItem::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 30),
        'item_id' => $faker->numberBetween($min = 1, $max = 30),
        'quantity' => $faker->numberBetween($min = 1, $max = 30)
    ];
});

$factory->define(App\Models\Diary::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'description' => $faker->sentence,
        'user_id' => factory(App\Models\User::class)->create()->id
    ];
});
