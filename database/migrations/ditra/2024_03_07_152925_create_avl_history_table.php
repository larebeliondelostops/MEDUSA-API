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
        Schema::create('avl_history', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_uniformado')->nullable();
            $table->string('imei')->nullable();
            $table->timestamp('fecha_movil')->nullable();
            $table->timestamp('fecha_gps')->nullable();
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();
            $table->string('precision')->nullable();
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
        Schema::dropIfExists('avl_history');
    }
};
