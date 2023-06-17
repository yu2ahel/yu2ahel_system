<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\firms;
use Faker\Generator as Faker;

$factory->define(firms::class, function (Faker $faker) {

    return [
        'en_name' => $faker->word,
        'ar_name' => $faker->word,
        'ar_about_firm' => $faker->word,
        'en_about_firm' => $faker->word,
        'date_of_establishment' => $faker->word,
        'tax_register_no' => $faker->word,
        'commercial_register_no' => $faker->word,
        'firm_classification' => $faker->word,
        'main_branch_address' => $faker->word,
        'main_branch_city_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
