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
        Schema::create('incident', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->bigInteger('indicator_id')->unsigned()->nullable();
            $table->foreign('indicator_id')->references('id')->on('indicators');
            $table->string('address')->nullable();
            $table->text('description');
            $table->float('latitude')->nullable();
            $table->float('longitude')->nullable();
            $table->string('day')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->string('image')->nullable();
            $table->boolean('reviewed')->default(false);
            $table->timestamps();

            $table->index('uuid');
        });
    }

    public function down()
    {
        Schema::table('incident', function (Blueprint $table) {
            $table->dropForeign(['indicator_id']);
        });
        Schema::dropIfExists('incident');
    }
};
