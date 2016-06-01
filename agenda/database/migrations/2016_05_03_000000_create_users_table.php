<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('login', 20);
            $table->string('senha');
            $table->string('nivel', 30);
            $table->rememberToken();
            $table->timestamps();

            $table->integer('pessoa_id')->unique();

            $table->foreign('pessoa_id')->
            references('id')->
            on('pessoas')->
            onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('usuarios');
    }
}
