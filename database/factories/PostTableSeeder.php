<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\post;
use Faker\Generator as Faker;

$factory->define(post::class, function (Faker $faker) {
    return [
        'title' => $faker->randomElement(['Html', 'Css', 'Javascript', 'Python', 'Java', 'C++', 'C Language']),
        'body' => $faker->sentence($nb = 100, true),
        'user_id' => $faker->randomDigit(1, 10),
        'author' => $faker->name(),
        'image' => $faker->imageUrl('http://lorempixel.com/800/600/cats/'),

    ];
});