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
        Schema::create('ProbabilisticGrid', function (Blueprint $table) {
            $table->id();
            $table->float('ActualState', 6, 6);
            $table->float('FutureState', 6, 6);
            $table->string('type');
            $table->json('coordinates');
            $table->string('CurrentPercentage');
            $table->string('FuturePercentage');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ProbabilisticGrid');
    }
};
