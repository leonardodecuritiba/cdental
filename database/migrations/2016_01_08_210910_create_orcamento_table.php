<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrcamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orcamento', function (Blueprint $table) {
            $table->increments('idorcamento');
            $table->integer('idprofissional')->unsigned();
            $table->integer('idpaciente')->unsigned();
            $table->string('descricao',500)->nullable();
            $table->tinyInteger('desconto')->unsigned();
            $table->tinyInteger('numero_parcelas')->unsigned();
            $table->decimal('valor_entrada',10,2)->unsigned();
            $table->decimal('valor_total',10,2)->unsigned();
            $table->boolean('aprovacao')->unsigned()->default(0);

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
        Schema::drop('orcamento');
    }
}
