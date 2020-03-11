<?php

use Illuminate\Database\Seeder;

class PessoaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Pessoa::class, 10)->state(App\Pessoa::TYPE_INDIVIDUAL)->create();
        factory(App\Pessoa::class, 10)->state(App\Pessoa::TYPE_LEGAL)->create();
    }
}
