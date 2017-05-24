<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvolucaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evolucao', function (Blueprint $table) {
            $table->increments('idevolucao');
            $table->integer('idprofissional_criador')->unsigned();
            $table->integer('idpaciente')->unsigned();
            $table->date('data_evolucao');
            $table->longText('texto');

            $table->foreign('idprofissional_criador')->references('idprofissional')->on('profissional');
            $table->foreign('idpaciente')->references('idpaciente')->on('paciente');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('evolucao');
    }
}
