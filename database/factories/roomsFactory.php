<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\rooms;
use Faker\Generator as Faker;

$factory->define(rooms::class, function (Faker $faker) {

    return [
        'room_name' => $faker->word,
        'room_capacity' => $faker->randomDigitNotNull,
        'branch_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
