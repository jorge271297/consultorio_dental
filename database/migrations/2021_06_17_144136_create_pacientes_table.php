<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('foto', 120)->nullable();
            $table->string('nombres', 120);
            $table->string('apellido_paterno', 120);
            $table->string('apellido_materno', 120)->nullable();

            $table->date('fecha_nacimiento', 120)->nullable();
            $table->string('sexo', 1);
            $table->float('peso', 8, 2);
            $table->float('altura', 8, 2);

            $table->string('estado', 120);
            $table->string('municipio', 120);
            $table->string('colonia', 255);
            $table->string('domicilio', 255);
            $table->integer('codigo_postal');

            $table->string('email', 120)->nullable();
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
        Schema::dropIfExists('pacientes');
    }
}
