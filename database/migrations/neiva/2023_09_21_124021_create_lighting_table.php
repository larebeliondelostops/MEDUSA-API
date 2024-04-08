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
        Schema::create('lightings', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('name')->nullable();
            $table->string('street_light')->nullable();
            $table->string('sticker')->nullable();
            $table->string('power')->nullable();
            $table->string('technology')->nullable();
            $table->string('quadrant')->nullable();
            $table->string('department')->nullable();
            $table->string('municipality')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('support')->nullable();
            $table->string('transformer')->nullable();
            $table->string('image')->nullable();
            $table->float('latitude')->nullable();
            $table->float('longitude')->nullable();
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
