<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente', function (Blueprint $table) {
            $table->increments('idpaciente');
            $table->integer('idplano')->unsigned();
            $table->integer('idprofissional_criador')->unsigned();
            $table->integer('idcontato')->unsigned()->unique();
            $table->string('nome', 100);
//            $table->string('cpf', 11)->unique();
//            $table->string('rg', 10)->unique();
            $table->string('cpf', 11);
            $table->string('rg', 10);
            $table->boolean('sexo')->unsigned();
            $table->date('data_nascimento');
            $table->string('foto', 100)->nullable();

            $table->foreign('idplano')->references('idplano')->on('plano');
            $table->foreign('idprofissional_criador')->references('idprofissional')->on('profissional');
            $table->foreign('idcontato')->references('idcontato')->on('contato');
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
        Schema::drop('paciente');
    }
}
