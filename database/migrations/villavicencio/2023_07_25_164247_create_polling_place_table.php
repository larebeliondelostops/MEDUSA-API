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
        Schema::create('polling_places', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->float('latitude')->nullable();
            $table->float('longitude')->nullable();
            $table->integer('potential_women')->nullable();
            $table->integer('potential_men')->nullable();
            $table->integer('total_votes')->nullable();
            $table->integer('tables')->nullable();
            $table->timestamps();

            $table->index('uuid');
        });
    }

    public function down()
    {
        Schema::dropIfExists('polling_places');
    }
};
