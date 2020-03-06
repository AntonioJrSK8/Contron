<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\OrdemServico;
use Faker\Generator as Faker;

$factory->define(OrdemServico::class, function (Faker $faker) {
    return [
        'descricao' => $faker->domainWord,
        'user_id' => 1
    ];
});
