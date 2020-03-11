<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pessoa;
use Faker\Generator as Faker;

$factory->define(Pessoa::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'email' => $faker->email,
        'fone' => $faker->PhoneNumber,
        'defaulter' => rand(0,1), //inadimplente
    ];
});

$factory->state(Pessoa::class, App\Pessoa::TYPE_INDIVIDUAL, function(Faker $faker){

    //$faker->addProvider(new JansenFelipe\FakerBR\FakerBR($faker));

    return [
        'data_nascimento' => $faker->date,
        'documento_numero' => $faker->cpf,
        'sexo'=> rand(1, 10) % 2==0?'m':'f',
        'status_civil' => rand(1,3),
        'def_fisica' => rand(0,1),
        'pessoa_tipo' => App\Pessoa::TYPE_INDIVIDUAL
    ];
});

$factory->state(Pessoa::class, App\Pessoa::TYPE_LEGAL, function(Faker $faker){

    //$faker->addProvider(new JansenFelipe\FakerBR\FakerBR($faker));

    return [
        'empresa_nome' => $faker->company,
        'documento_numero' => $faker->cnpj,
        'pessoa_tipo' => App\Pessoa::TYPE_LEGAL
    ];
});
