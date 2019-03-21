<?php

use Faker\Generator as Faker;

$autoIncrement = autoIncrement();


$factory->define(\Kinytron\Answer::class, function (Faker $faker) use ($autoIncrement){
    $autoIncrement->next();
    //CLIMA ESCOLAR
    /*
    return [
        'answer' => $faker->numberBetween(1,5),
        'question_number' => $autoIncrement->current(),
        'measurement_id' => 1,
    ];
    */

    //AUTOESTIMA

    return [
        'answer' => $faker->numberBetween(1,3),
        'question_number' => $autoIncrement->current(),
        'measurement_id' => 2,
    ];

});

function autoIncrement()
{
    //CLIMA ESCOLAR
    /*
    for ($i = 0; $i < 19; $i++) {
    yield $i;
    if($i==18){
    $i = 0;
    }
    }
    */

    //AUTOESTIMA

    for ($i = 0; $i < 21; $i++) {
    yield $i;
    if($i==20){
    $i = 0;
    }
    }


}