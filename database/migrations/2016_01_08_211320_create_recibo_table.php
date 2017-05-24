<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReciboTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recibo', function (Blueprint $table) {
            $table->increments('idrecibo');
            $table->integer('idparcela')->unsigned();
            $table->date('data_recibo');
            $table->decimal('valor', 10, 2);
            $table->string('observacao',500);

            $table->foreign('idparcela')->references('idparcela')->on('parcela')
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
        Schema::drop('recibo');
    }
}
