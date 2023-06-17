<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\service_provider_services;
use Faker\Generator as Faker;

$factory->define(service_provider_services::class, function (Faker $faker) {

    return [
        'firm_id' => $faker->randomDigitNotNull,
        'department_id' => $faker->randomDigitNotNull,
        'service_type_id' => $faker->randomDigitNotNull,
        'service_provider_id' => $faker->randomDigitNotNull,
        'service_provider_percentage' => $faker->randomDigitNotNull,
        'price_regular' => $faker->randomDigitNotNull,
        'price_urgent' => $faker->randomDigitNotNull,
        'price_discount' => $faker->randomDigitNotNull,
        'is_free_accepted' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
