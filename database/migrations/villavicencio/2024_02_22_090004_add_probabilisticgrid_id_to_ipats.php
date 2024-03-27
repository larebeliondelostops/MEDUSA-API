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
            $table->unsignedBigInteger('probabilisticgrid_id')->nullable();
            $table->foreign('probabilisticgrid_id')->references('id')->on('probabilistic_grid_ipats');
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
            $table->dropForeign(['probabilisticgrid_id']);
            $table->dropColumn('probabilisticgrid_id');
        });
    }
};
