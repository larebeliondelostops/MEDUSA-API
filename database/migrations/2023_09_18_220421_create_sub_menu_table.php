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
        Schema::create('sub_menu', function (Blueprint $table) {
            $table->id('sub_menu');
            $table->string('identifier');
            $table->foreignId('menu')->constrained('menu');
            $table->integer('level');
            $table->string('name');
            $table->string('path');
            $table->string('icon');
            $table->string('slug');
            $table->boolean('enabled')->default(true);
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
        Schema::table('sub_menu', function (Blueprint $table) {
            // Eliminar la clave foránea 'menu'
            $table->dropForeign(['menu']);
        });
        Schema::dropIfExists('sub_menu');
    }
};
