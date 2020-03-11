<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('documento_numero');
            $table->string('email');
            $table->string('fone');
            $table->boolean('defaulter'); //inadimplente
            $table->date('data_nascimento')->nullable();
            $table->char('sexo')->nullable();
            $table->enum('status_civil', array_keys(\App\Pessoa::STATUS_CIVIL))->nullable();
            $table->string('def_fisica')->nullable();
            $table->string('empresa_nome')->nullable();
            $table->string('pessoa_tipo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoas');
    }
}
