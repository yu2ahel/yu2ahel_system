<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\case_details;
use Faker\Generator as Faker;

$factory->define(case_details::class, function (Faker $faker) {

    return [
        'beneficiary_id' => $faker->randomDigitNotNull,
        'last_diagnosis' => $faker->word,
        'initial_diagnosis' => $faker->word,
        'family_social_status' => $faker->randomDigitNotNull,
        'father_occupation' => $faker->word,
        'mother_occupation' => $faker->word,
        'escorter_name' => $faker->word,
        'notes' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
