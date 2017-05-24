<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanoIntervencaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plano_intervencao', function (Blueprint $table) {
            $table->increments('idplano_intervencao');
            $table->integer('idintervencao')->unsigned();
            $table->integer('idplano')->unsigned();
//            $table->decimal('valor_paciente',10,2)->nullable();
            $table->decimal('valor_plano',10,2)->nullable();

            $table->foreign('idintervencao')->references('idintervencao')->on('intervencao');
            $table->foreign('idplano')->references('idplano')->on('plano')
                ->onDelete('cascade');
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
        Schema::drop('plano_intervencao');
    }
}
