<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\user;
use Faker\Generator as Faker;

$factory->define(user::class, function (Faker $faker) {
    return [
        $p1 = new user(),
        $p1->name = 'admin1',
        $p1->email = 'admin1@mail.com',
        $p1->password = 'admin1',

        $p2 = new user(),
        $p2->name = 'admin2',
        $p2->email = 'admin2@mail.com',
        $p2->password = 'admin2',

        $p3 = new user(),
        $p3->name = 'admin3',
        $p3->email = 'admin3@mail.com',
        $p3->password = 'admin3',
    ];
});