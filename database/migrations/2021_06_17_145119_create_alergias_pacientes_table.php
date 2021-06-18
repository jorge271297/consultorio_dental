<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlergiasPacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alergias_pacientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alergia_id');
            $table->unsignedBigInteger('paciente_id');

            $table->foreign('alergia_id')->references('id')->on('alergias');
            $table->foreign('paciente_id')->references('id')->on('pacientes');

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
        Schema::dropIfExists('alergias_pacientes');
    }
}
