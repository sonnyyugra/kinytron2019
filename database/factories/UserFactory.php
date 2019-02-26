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

$factory->define(Kinytron\User::class, function (Faker $faker) {
    return [
        'name' => $faker->firstNameMale,
        'email' => $faker->unique()->email,
        'password' => bcrypt('123'), // secret
        'remember_token' => str_random(10),
        'user_type' => 1,
        'course_id' => 1,
        'college_id' => 1,
    ];
});
