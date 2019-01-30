<?php

use Faker\Generator as Faker;

$factory->define(\Kinytron\College::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
