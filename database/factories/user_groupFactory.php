<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\user_group;
use Faker\Generator as Faker;

$factory->define(user_group::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'description' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
