<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\firm_beneficiaries;
use Faker\Generator as Faker;

$factory->define(firm_beneficiaries::class, function (Faker $faker) {

    return [
        'firm_id' => $faker->randomDigitNotNull,
        'branch_id' => $faker->randomDigitNotNull,
        'beneficiary_id' => $faker->randomDigitNotNull,
        'supervisor_id' => $faker->randomDigitNotNull,
        'registration_date' => $faker->word,
        'status' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
