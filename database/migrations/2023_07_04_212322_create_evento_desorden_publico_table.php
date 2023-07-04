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
        Schema::create('evento_desorden_publico', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_evento');
            $table->json('coordenada_punto');
            $table->foreign('id_evento')->references('id')->on('eventos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evento_desorden_publico');
    }
};
