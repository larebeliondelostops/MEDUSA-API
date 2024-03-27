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
        Schema::create('cameras', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->text('url')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->timestamps();

            $table->index('uuid');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cameras');
    }
};
