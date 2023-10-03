<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Connection name.
     *
     * @return string
     */
    protected $connection = 'neiva';

    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('lighting', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('name');
            $table->string('farola')->nullable();
            $table->string('sticker')->nullable();
            $table->string('potencia')->nullable();
            $table->string('tecnologia') ->nullable();
            $table->string('cuadrante')->nullable();
            $table->string('departamento')->nullable();
            $table->string('municipio')->nullable();
            $table->string('w')->nullable();
            $table->string('h')->nullable();
            $table->string('soporte')->nullable();
            $table->string('transformador')->nullable();
            $table->string('imagen')->nullable();
            $table->json('position');
            $table->timestamps();

            $table->index('uuid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lighting');
    }
};
