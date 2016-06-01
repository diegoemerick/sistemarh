<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoaEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // tabela pessoaendereco
        Schema::create('pessoa_enderecos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('logradouro', 150)->nullable();
            $table->string('numero', 20)->nullable();
            $table->string('bairro', 80)->nullable();
            $table->string('cep', 10)->nullable();
            $table->string('complemento', 50)->nullable();
            $table->string('estado', 20)->nullable();
            $table->string('cidade', 20)->nullable();

            // Chave estrangeira
            $table->integer('pessoa_id');
            $table->foreign('pessoa_id')
            ->references('id')
            ->on('pessoas')
            ->onDelete('cascade');
            
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
        Schema::drop('pessoa_enderecos');
    }
}
