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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tipo_evento_id') ;
            $table->foreign('tipo_evento_id')->references('id')->on('tipo_evento');
            $table->string('nombre') ;
            $table->date('fecha_inicio') ;
            $table->date('fecha_fin') ;
            $table->time('hora_inicio') ;
            $table->time('hora_fin') ;
            $table->string('direccion') ;
            $table->double('longitud') ;
            $table->double('latitud') ;
            $table->integer('capacidad') ;
            $table->string('estado') ;
            $table->string('lugar') ;
            $table->string('entidad_autorizante') ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
};
