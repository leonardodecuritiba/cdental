<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespostaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resposta', function (Blueprint $table) {
            $table->increments('idresposta');
            $table->integer('idpergunta')->unsigned();
            $table->integer('idpaciente')->unsigned();
            $table->boolean('resposta')->nullable();
            $table->string('texto_resposta',1000)->nullable();

            $table->foreign('idpergunta')->references('idpergunta')->on('pergunta');
            $table->foreign('idpaciente')->references('idpaciente')->on('paciente');
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
        Schema::drop('resposta');
    }
}
