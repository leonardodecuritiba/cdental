<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagamento', function (Blueprint $table) {
            $table->increments('idpagamento');
            $table->integer('idorcamento')->unsigned();
            $table->integer('idpaciente')->unsigned();
            $table->boolean('pagamento')->unsigned()->default(0);

            $table->foreign('idorcamento')->references('idorcamento')->on('orcamento')
                ->onDelete('cascade');
            $table->foreign('idpaciente')->references('idpaciente')->on('paciente')
                ->onDelete('cascade');
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
        Schema::drop('pagamento');
    }
}
