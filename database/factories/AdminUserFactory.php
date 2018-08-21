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

$factory->define(App\Models\AdminUser::class, function (Faker $faker) {
    $updated_at = $faker->dateTimeThisMonth;
    $created_at = $faker->dateTimeThisMonth($updated_at);
    return [
        'username' => $faker->unique()->userName,
        'name' => $faker->name,
        //'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('123456'), // secret
        'remember_token' => str_random(10),
        'avatar' => '',
        'created_at' => $created_at,
        'updated_at' => $updated_at,
    ];
});
