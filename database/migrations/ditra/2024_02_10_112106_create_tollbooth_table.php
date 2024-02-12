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
        Schema::create('tollbooth', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->string('id_peaje');
            $table->string('name')->nullable();
            $table->string('state')->nullable();
            $table->string('project')->nullable();
            $table->string('electronic')->nullable();
            $table->string('cod_via')->nullable();
            $table->string('pr')->nullable();
            $table->string('department')->nullable();
            $table->string('municipality')->nullable();
            $table->string('coordinates')->nullable();
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
        Schema::dropIfExists('tollbooth');
    }
};
