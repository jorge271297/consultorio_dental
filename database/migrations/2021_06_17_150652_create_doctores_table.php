<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctores', function (Blueprint $table) {
            $table->id();
            $table->string('foto', 120)->nullable();
            $table->string('nombres', 120);
            $table->string('apellido_paterno', 120);
            $table->string('apellido_materno', 120)->nullable();

            $table->string('cedula_profesional', 16);
            $table->string('numero_salubridad', 16);

            $table->string('estado', 120);
            $table->string('municipio', 120);
            $table->string('colonia', 255);
            $table->string('domicilio', 255);
            $table->integer('codigo_postal');

            $table->string('telefono_fijo', 120)->nullable();
            $table->string('telefono_movil', 120)->nullable();

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
        Schema::dropIfExists('doctores');
    }
}
