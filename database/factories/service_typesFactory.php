<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\service_types;
use Faker\Generator as Faker;

$factory->define(service_types::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'average_time_in_minutes' => $faker->randomDigitNotNull,
        'default_price_regular' => $faker->word,
        'default_price_urgent' => $faker->randomDigitNotNull,
        'default_price_discount' => $faker->randomDigitNotNull,
        'is_freeable' => $faker->randomDigitNotNull,
        'service_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
