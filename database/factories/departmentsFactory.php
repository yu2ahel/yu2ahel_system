<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\departments;
use Faker\Generator as Faker;

$factory->define(departments::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'brief' => $faker->word,
        'description' => $faker->word,
        'photo' => $faker->word,
        'firm_id' => $faker->randomDigitNotNull,
        'supervisor_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
