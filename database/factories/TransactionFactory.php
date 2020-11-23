<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\transaction;
use Faker\Generator as Faker;

$factory->define(transaction::class, function (Faker $faker) {
    return [
        'amount' => $faker->numberBetween(100, 2000),
        'transaction_date' => $faker->date()
    ];
});
