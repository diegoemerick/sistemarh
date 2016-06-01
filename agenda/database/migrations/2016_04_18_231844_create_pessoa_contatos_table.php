<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoaContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Tabeça pessoas contatos
        Schema::create('pessoa_contatos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('telefone');
            $table->string('operadora');
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
        Schema::drop('pessoa_contatos');
    }
}
