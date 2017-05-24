<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documento', function (Blueprint $table) {
            $table->increments('iddocumento');
            $table->integer('idprofissional_criador')->unsigned();
            $table->integer('idpaciente')->unsigned();
            $table->string('documento',100);

            $table->foreign('idprofissional_criador')->references('idprofissional')->on('profissional');
            $table->foreign('idpaciente')->references('idpaciente')->on('paciente')->onDelete('cascade');
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
        Schema::drop('documento');
    }
}
