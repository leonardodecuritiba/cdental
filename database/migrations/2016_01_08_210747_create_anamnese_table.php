<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnamneseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anamnese', function (Blueprint $table) {
            $table->increments('idanamnese');
            $table->integer('idprofissional_criador')->unsigned();
            $table->string('nome',100);
            $table->foreign('idprofissional_criador')->references('idprofissional')->on('profissional');
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
        Schema::drop('anamnese');
    }
}
