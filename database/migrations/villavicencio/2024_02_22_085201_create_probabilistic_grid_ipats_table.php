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
        Schema::create('probabilistic_grid_ipats', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->json('coordinates');
            $table->float('ActualStateAccidents', 6, 6);
            $table->float('FutureStateAccidents', 6, 6);
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
        Schema::dropIfExists('probabilistic_grid_ipats');
    }
};
