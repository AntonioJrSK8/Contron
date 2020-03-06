<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cliente;
use Faker\Generator as Faker;

$factory->define(Cliente::class, function (Faker $faker) {
    return [
        'nome' => $faker->firstName,
        'nome_fantasia' => $faker->company,
        'user_id' => 1
    ];
});
