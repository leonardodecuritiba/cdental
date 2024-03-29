<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContatoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contato', function (Blueprint $table) {
            $table->increments('idcontato');
            $table->string('cep', 16)->nullable();
            $table->string('estado', 72)->nullable();
            $table->string('cidade', 60)->nullable();
            $table->string('bairro', 72)->nullable();
            $table->string('logradouro', 125)->nullable();
            $table->string('complemento', 50)->nullable();
            $table->string('telefone', 11)->nullable();
            $table->string('comercial', 11)->nullable();
            $table->string('celular', 11)->nullable();
            $table->string('email', 60)->nullable();
            $table->string('facebook', 255)->nullable();
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
        Schema::drop('contato');
    }
}
