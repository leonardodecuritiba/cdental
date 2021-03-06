<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consulta', function (Blueprint $table) {
            $table->increments('idconsulta');
            $table->integer('idprofissional_criador')->unsigned();
            $table->integer('idprofissional')->unsigned();
            $table->integer('idpaciente')->unsigned()->nullable();
            $table->date('data_consulta');
            $table->boolean('dia_inteiro')->default(0);
            $table->string('hora_inicio',5);
            $table->string('hora_termino',5);
            $table->string('observacao',1000)->nullable();
            $table->enum('tipo_consulta', array('Atendimento','Cirurgia','Emergência','Retorno'));
            $table->string('nome', 100)->nullable();
            $table->string('telefone', 11)->nullable();
            
            $table->foreign('idprofissional_criador')->references('idprofissional')->on('profissional');
            $table->foreign('idprofissional')->references('idprofissional')->on('profissional');
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
        Schema::drop('consulta');
    }
}
