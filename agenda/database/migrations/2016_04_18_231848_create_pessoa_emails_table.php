<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoaEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Tabela pessoa_emails
        Schema::create('pessoa_emails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 80)->nullable();

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
        Schema::drop('pessoa_emails');
    }
}
