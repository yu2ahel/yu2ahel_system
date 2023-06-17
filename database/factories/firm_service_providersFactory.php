<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\firm_service_providers;
use Faker\Generator as Faker;

$factory->define(firm_service_providers::class, function (Faker $faker) {

    return [
        'job_title' => $faker->word,
        'basic_salary' => $faker->randomDigitNotNull,
        'default_services_percentage' => $faker->randomDigitNotNull,
        'date_of_registration' => $faker->word,
        'firm_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
