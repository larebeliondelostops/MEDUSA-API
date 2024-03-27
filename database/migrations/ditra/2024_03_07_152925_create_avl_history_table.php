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
    {   //atributos en ingles
        Schema::create('avl_history', function (Blueprint $table) {
            $table->id();
            // $table->string('nombre_uniformado')->nullable();

            $table->string('uniformed_name')->nullable();
            $table->string('imei')->nullable();
            $table->timestamp('mobile_date')->nullable();
            $table->timestamp('gps_date')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
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
