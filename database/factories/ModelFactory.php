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

$factory->define(App\Models\Access\User\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Track::class, function (Faker\Generator $faker) {
    return [
        'title'         => $faker->sentence(mt_rand(3, 10)),
        'description'   => join("\n\n", $faker->paragraphs(mt_rand(3, 6))),
        'published_at'  => $faker->dateTimeBetween('-1 month', '+3 days'),
        'zip'           => $faker->postcode,
        'user_id'       => $faker->boolean(50),
        'type'          => $faker->boolean(50),
        'image'         => $faker->imageUrl(),
        'file'          => $faker->imageUrl(),
        'slug'          => $faker->slug(),
    ];
});