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
    protected $connection = 'villavicencio';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incident', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->bigInteger('indicator');
            $table->foreign('indicator')->references('id')->on('Indicators');
            $table->string('address');
            $table->text('description');
            $table->string('position');
            $table->string('image');
            $table->boolean('reviewed')->default(false);
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
        Schema::table('incident', function (Blueprint $table) {
            // Eliminar la clave foránea 'indicator'
            $table->dropForeign(['indicator']);
        });
        Schema::dropIfExists('incident');
    }
};
