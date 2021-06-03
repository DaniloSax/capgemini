<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Account;
use Faker\Generator as Faker;

$factory->define(Account::class, function (Faker $faker) {
    return [
        'account' => $faker->randomNumber(7),
        'agency' => $faker->randomNumber(4),
        'balance' => $faker->randomFloat(2, 500, 10000)
    ];
});
