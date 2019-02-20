<?php

use Faker\Generator as Faker;

$autoIncrement = autoIncrement();


$factory->define(\Kinytron\Answer::class, function (Faker $faker) use ($autoIncrement){
    $autoIncrement->next();
    return [
        'answer' => $faker->numberBetween(1,3),
        'question_number' => $autoIncrement->current(),
        'measurement_id' => 1,
    ];
});

function autoIncrement()
{
    for ($i = 0; $i < 21; $i++) {
        yield $i;
        if($i==20){
            $i = 0;
        }
    }
}