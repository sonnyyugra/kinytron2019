<?php

use Faker\Generator as Faker;

$autoIncrement = autoIncrement();


$factory->define(\Kinytron\Answer::class, function (Faker $faker) use ($autoIncrement) {
    $autoIncrement->next();
    //CLIMA ESCOLAR

    // return [
    //     'answer' => $faker->numberBetween(1, 5),
    //     'question_number' => $autoIncrement->current(),
    //     'measurement_id' => 11,
    // ];

    // //AUTOESTIMA

    // return [
    //     'answer' => $faker->numberBetween(1, 3),
    //     'question_number' => $autoIncrement->current(),
    //     'measurement_id' => 12,
    // ];

    //TRABAJO EN EQUIPO

    return [
        'answer' => $faker->numberBetween(1, 3),
        'question_number' => $autoIncrement->current(),
        'measurement_id' => 34,
    ];
});

function autoIncrement()
{
    // //CLIMA ESCOLAR

    // for ($i = 0; $i < 19; $i++) {
    //     yield $i;
    //     if ($i == 18) {
    //         $i = 0;
    //     }
    // }


    // //AUTOESTIMA

    // for ($i = 0; $i < 21; $i++) {
    //     yield $i;
    //     if ($i == 20) {
    //         $i = 0;
    //     }
    // }

    //TRABAJO EN EQUIPO

    for ($i = 0; $i < 8; $i++) {
        yield $i;
        if ($i == 7) {
            $i = 0;
        }
    }
}
