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
        Schema::create('fields', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('placeholder')->nullable();
            $table->string('key');
            $table->bigInteger('type');
            $table->foreign('type')->references('id')->on('select_type');
            $table->boolean('required');
            $table->string('schema');
            //$table->boolean('accions');
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
        Schema::table('fields', function (Blueprint $table) {
            // Eliminar la clave foránea 'type'
            $table->dropForeign(['type']);
        });
        Schema::dropIfExists('fields');
    }
};
