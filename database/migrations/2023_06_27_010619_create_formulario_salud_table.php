<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formulario_salud', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('entidades_id');
            $table->foreign('entidades_id')->references('id')->on('entidades');
            $table->integer('pacientes_urgencia');
            $table->integer('camas_urgencias_disponibles');
            $table->integer('salas_cirugias_disponibles');
            $table->integer('unidad_intensivos_disponibles');
            $table->integer('camas_primer_nivel');
            $table->integer('camas_segundo_nivel');
            $table->integer('camas_tercer_nivel');
            $table->boolean('banco_sangre');
            $table->integer('medicos_en_turno');
            $table->integer('enfermeras_en_turno');
            $table->string('ips_afiliada');
            $table->integer('cantidad_urgencias_dia');
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
        Schema::dropIfExists('formulario_salud');
    }
};
