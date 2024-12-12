<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// {
//     "Secretaria": "VILLAVICENCIO",
//     "Nombre Establecimiento": "LICEO TECNOLOGICO DE COLOMBIA",
//     "Nombre Sede": "LICEO TECNOLÓGICO DE COLOMBIA",
//     "Sector": "NO OFICIAL",
//     "Zona": "URBANA",
//     "Dirección": "IND CL 43 30 39",
//     "Teléfono": "6783907-3207425722",
//     "Latitud": 4.1569078,
//     "Longitud": -73.63946849999999
// },


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educational_centers', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('secretary')->nullable();
            $table->string('name')->nullable();
            $table->string('headquarters')->nullable();
            $table->string('sector')->nullable();
            $table->string('zone')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->float('latitude')->nullable();
            $table->float('longitude')->nullable();
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
        Schema::dropIfExists('educational_centers');
    }
};
