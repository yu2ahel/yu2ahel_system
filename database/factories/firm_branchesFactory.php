<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\firm_branches;
use Faker\Generator as Faker;

$factory->define(firm_branches::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'working_hours' => $faker->randomDigitNotNull,
        'firm_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
