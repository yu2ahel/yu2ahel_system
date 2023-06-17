<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\service_schedule;
use Faker\Generator as Faker;

$factory->define(service_schedule::class, function (Faker $faker) {

    return [
        'beneficiary_id' => $faker->randomDigitNotNull,
        'service_provider_id' => $faker->randomDigitNotNull,
        'branch_id' => $faker->randomDigitNotNull,
        'service_type_id' => $faker->randomDigitNotNull,
        'department_id' => $faker->randomDigitNotNull,
        'room_id' => $faker->randomDigitNotNull,
        'date_time' => $faker->word,
        'accounting_type' => $faker->randomDigitNotNull,
        'base_fees' => $faker->randomDigitNotNull,
        'extra_fees' => $faker->randomDigitNotNull,
        'extra_fees_note' => $faker->word,
        'total_fees' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
