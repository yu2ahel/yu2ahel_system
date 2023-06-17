<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\services;
use Faker\Generator as Faker;

$factory->define(services::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'description' => $faker->word,
        'percentage_discount_for_group_service' => $faker->randomDigitNotNull,
        'is_schedulable' => $faker->word,
        'is_plannable' => $faker->word,
        'is_attendable' => $faker->word,
        'firm_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
