<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Empresa;
use Faker\Generator as Faker;

$factory->define(Empresa::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'nome' => $faker->domainWord,
        'nome_fantasia' => $faker->domainName,
    ];
});
