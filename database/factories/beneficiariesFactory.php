<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\beneficiaries;
use Faker\Generator as Faker;

$factory->define(beneficiaries::class, function (Faker $faker) {

    return [
        'full_name' => $faker->word,
        'type' => $faker->randomDigitNotNull,
        'date_of_birth' => $faker->word,
        'transferred_from' => $faker->word,
        'about' => $faker->word,
        'degree' => $faker->randomDigitNotNull,
        'occupation' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
