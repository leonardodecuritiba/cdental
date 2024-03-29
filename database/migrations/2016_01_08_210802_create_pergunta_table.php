<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerguntaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pergunta', function (Blueprint $table) {
            $table->increments('idpergunta');
            $table->integer('idanamnese')->unsigned();
            $table->tinyInteger('numero_ordem')->unsigned();
            $table->tinyInteger('tipo_pergunta')->unsigned();
            $table->tinyInteger('tipo_resposta')->unsigned();
            $table->string('texto_pergunta',500);
            $table->string('msg_alerta',500)->nullable();

            $table->foreign('idanamnese')->references('idanamnese')->on('anamnese');
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
        Schema::drop('pergunta');
    }
}
