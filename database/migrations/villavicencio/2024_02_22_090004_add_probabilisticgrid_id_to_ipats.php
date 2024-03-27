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
        Schema::table('ipats', function (Blueprint $table) {
            $table->unsignedBigInteger('probabilistic_grid_id')->nullable();
            $table->foreign('probabilistic_grid_id')->references('id')->on('probabilistic_grid_ipats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ipats', function (Blueprint $table) {
            $table->dropForeign(['probabilistic_grid_id']);
            $table->dropColumn('probabilistic_grid_id');
        });
    }
};
