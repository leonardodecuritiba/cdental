<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfissionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profissional', function (Blueprint $table) {
            $table->increments('idprofissional');
            $table->integer('idusers')->unsigned();
            $table->integer('idcontato')->unsigned();
            $table->string('nome', 100);
            $table->string('cpf', 11)->unique();
            $table->string('cro', 5)->nullable();
            $table->string('foto', 100)->nullable();

            $table->foreign('idusers')->references('idusers')->on('users');
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
        Schema::drop('profissional');
    }
}
