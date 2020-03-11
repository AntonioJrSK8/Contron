<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(EmpresaTableSeeder::class);

        $this->call(ProdutosTableSeeder::class);
        $this->call(OrdemServicoSeeder::class);
        $this->call(CentroCustoSeeder::class);

        //$this->call(MenuTableSeeder::class);
        //$this->call(PerfilSeeder::class);
        //$this->call(PerfilUserSeeder::class);
        //$this->call(PerfilMenuSeeder::class);

        $this->call(ClientesTableSeeder::class);

        $this->call(PessoaTableSeeder::class);

    }
}
