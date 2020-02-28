<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idpaciente')->unsigned();
            $table->foreign('idpaciente')->references('idpaciente')->on('paciente')->onDelete('cascade');
            $table->string('name', 50);
            $table->string('description', 100)->nullable();
            $table->string('link', 100);

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
        Schema::dropIfExists('patient_images');
    }
}
