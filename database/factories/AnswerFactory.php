<?php

use Faker\Generator as Faker;

$autoIncrement = autoIncrement();


$factory->define(\Kinytron\Answer::class, function (Faker $faker) use ($autoIncrement){
    $autoIncrement->next();
    return [
        'answer' => $faker->numberBetween(1,5),
        'question_number' => $autoIncrement->current(),
        'measurement_id' => 1,
    ];
});

function autoIncrement()
{
    for ($i = 0; $i < 19; $i++) {
        yield $i;
        if($i==18){
            $i = 0;
        }
    }
}