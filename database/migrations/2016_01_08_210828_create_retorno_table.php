<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRetornoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retorno', function (Blueprint $table) {
            $table->increments('idretorno');
            $table->integer('idprofissional_criador')->unsigned();
            $table->integer('idprofissional')->unsigned();
            $table->integer('idpaciente')->unsigned();
            $table->date('data_retorno');
            $table->string('motivo_retorno',1000)->nullable();
            $table->string('observacao',500)->nullable();

            $table->foreign('idprofissional_criador')->references('idprofissional')->on('profissional');
            $table->foreign('idprofissional')->references('idprofissional')->on('profissional');
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
        Schema::drop('retorno');
    }
}
