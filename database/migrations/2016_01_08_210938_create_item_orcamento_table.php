<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemOrcamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_orcamento', function (Blueprint $table) {
            $table->increments('iditem_orcamento');
            $table->integer('idorcamento')->unsigned();
            $table->integer('idintervencao')->unsigned();
            $table->string('regiao', 50);
            $table->decimal('valor', 10, 2);

            $table->foreign('idorcamento')->references('idorcamento')->on('orcamento')
                ->onDelete('cascade');
            $table->foreign('idintervencao')->references('idintervencao')->on('intervencao')
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
        Schema::drop('item_orcamento');
    }
}
