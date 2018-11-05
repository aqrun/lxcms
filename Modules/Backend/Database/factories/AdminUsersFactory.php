<?php

use Faker\Generator as Faker;

$factory->define(\Modules\Backend\Entities\AdminUser::class, function (Faker $faker) {
    $updated_at = $faker->dateTimeThisMonth;
    $created_at = $faker->dateTimeThisMonth($updated_at);
    $username = $faker->unique()->userName;
    return [
        'username' => $username,
        'password' => bcrypt('123456'),
        'name' => $username,
        'email' => $username. '@qq.com',
        'mobile' => '180'. $faker->regexify('[0-9]{8}'),
        'weight' => 0,
        'status' => 1,
        'gender' => $faker->randomElement([1,0]),
        'birthday' => $faker->dateTimeThisYear()->getTimestamp(),
        'remember_token' => str_random(10),
        'avatar' => '',
        'created_at' => $created_at,
        'updated_at' => $updated_at,
    ];
});
