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
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('module');
            $table->foreign('module')->references('id')->on('modules');
            $table->bigInteger('field');
            $table->foreign('field')->references('id')->on('fields');
            //$table->foreign('action')->references('id')->on('crud_actions');
            //$table->string('name');
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
        Schema::table('forms', function (Blueprint $table) {
            // Eliminar la clave foránea 'module' y 'field
            $table->dropForeign(['module']);
            $table->dropForeign(['field']);
        });
        Schema::dropIfExists('forms');
    }
};
