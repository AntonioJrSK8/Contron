<?php

use Illuminate\Database\Seeder;

class ProdutosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Produto::class, 3)->create();

        // factory(App\Produto::class, 1)->create()->each(function ($produto) {
        //     $produto->user()->save(factory(App\User::class)->create());
        // });
    }
}
