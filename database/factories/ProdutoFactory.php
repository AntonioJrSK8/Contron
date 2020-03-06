<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Produto;
use Faker\Generator as Faker;

$factory->define(Produto::class, function (Faker $faker) {
    $array = [
        "1" => "produto",
        "2" => "serviço",
    ];
    return [
        'tipo'=> $array[random_int(1, 2)],
        'descricao'=> $faker->company,
        'user_id' => 1
    ];
});
