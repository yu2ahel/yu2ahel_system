<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\countries;
use Faker\Generator as Faker;

$factory->define(countries::class, function (Faker $faker) {

    return [
        'en_name' => $faker->word,
        'ar_name' => $faker->word,
        'time_zone' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
