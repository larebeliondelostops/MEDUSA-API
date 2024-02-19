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
        Schema::create('hurtos_vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('cabecera')->nullable();
            $table->string('distrito')->nullable();
            $table->string('estacion')->nullable();
            $table->string('cai')->nullable();
            $table->string('cuadrante')->nullable();
            $table->string('barrio')->nullable();
            $table->integer('cantidad')->nullable();
            $table->string('direccion')->nullable();
            $table->string('sitio')->nullable();
            $table->string('mes')->nullable();
            $table->string('semana')->nullable();
            $table->string('fecha')->nullable();
            $table->string('dia')->nullable();
            $table->string('hora')->nullable();
            $table->string('hora_24')->nullable();
            $table->string('delito')->nullable();
            $table->string('conducta')->nullable();
            $table->string('modalidad')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('clase_bien')->nullable();
            $table->string('modelo')->nullable();
            $table->string('zona')->nullable();
            $table->string('numero_unico')->nullable();
            $table->string('cantidad_2')->nullable();
            $table->string('placa')->nullable();
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
        Schema::dropIfExists('hurtos_vehiculos');
    }
};
