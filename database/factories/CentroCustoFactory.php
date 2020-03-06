<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CentroCusto;
use Faker\Generator as Faker;

$factory->define(CentroCusto::class, function (Faker $faker) {
    return [
        'descricao' => $faker->domainWord,

        'user_id' => 1
    ];
});
