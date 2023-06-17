<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\service_providers;
use Faker\Generator as Faker;

$factory->define(service_providers::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'photo' => $faker->word,
        'id_number' => $faker->word,
        'id_type' => $faker->randomDigitNotNull,
        'gender' => $faker->randomDigitNotNull,
        'about' => $faker->word,
        'user_type_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
