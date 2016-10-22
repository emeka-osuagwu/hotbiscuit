<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'age'               => 30,
        'sex'               => "Male",
        'email'             => $faker->safeEmail,
        'phone'             => 0000000000,
        'about'             => "this is a user",
        'password'          => bcrypt(str_random(10)),
        'questions'         => json_encode([1, 2]),
        'location'          => "lagos",
        'username'          => $faker->name,
        'remember_token'    => str_random(10),
    ];
});


$factory->define(App\Question::class, function (Faker\Generator $faker) {
    return [
        "question_1" => "Wizkid",
        "question_2" => "Davido",
        "option_1"   => "Davido",
        "option_2"   => "Davido",
        "answer"     => "Davido",
    ];
});
