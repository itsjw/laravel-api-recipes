<?php

use Faker\Generator as Faker;

$factory->define(App\Recipe::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->sentence,
        'hours_to_make' => $faker->randomDigit,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime
    ];
});
