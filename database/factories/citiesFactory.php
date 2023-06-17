<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\cities;
use Faker\Generator as Faker;

$factory->define(cities::class, function (Faker $faker) {

    return [
        'en_name' => $faker->word,
        'ar_name' => $faker->word,
        'country_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
