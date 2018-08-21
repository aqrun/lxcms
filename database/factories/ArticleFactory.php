<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Article::class, function(Faker $faker){
    $publish_end = $faker->dateTimeThisMonth();
    $publish_begin = $faker->dateTimeThisMonth($publish_end);

    $updated_at = $faker->dateTimeThisMonth();
    $created_at = $faker->dateTimeThisMonth($updated_at);

    return [
        'user_id' => 0,
        'title' => $faker->sentence(),
        'excerpt' => $faker->text(),
        'hits' => $faker->numberBetween(0, 5000),
        'status' => $faker->boolean?1:0,
        'push_front' => $faker->boolean?1:0,
        'publish_begin' => $publish_begin,
        'publish_end' => $publish_end,
        'created_at' => $created_at,
        'updated_at' => $updated_at,
    ];
});
