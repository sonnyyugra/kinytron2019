<?php

use Faker\Generator as Faker;

$factory->define(\Kinytron\Course::class, function (Faker $faker) {
    return [
        'level' => 7,
        'letter' => 'A',
        'college_id' => 1,
    ];
});
