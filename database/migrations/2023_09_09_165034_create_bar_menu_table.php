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
        Schema::create('bar_menu', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_marker')->constrained('type_marker');
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
        Schema::table('bar_menu', function (Blueprint $table) {
            // Eliminar la clave foránea 'type_marker'
            $table->dropForeign(['type_marker']);
        });
        Schema::dropIfExists('bar_menu');
    }
};
