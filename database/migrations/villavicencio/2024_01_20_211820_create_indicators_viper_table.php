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
        Schema::create('indicators_viper', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('start_year_of_goal');
            $table->bigInteger('end_year_goal');
            $table->string('unit');
            $table->bigInteger('target_value');
            $table->bigInteger('progress');
            $table->double('percentage_completed');
            $table->boolean('is_main');
            $table->unsignedBigInteger('product_id');

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('indicators_viper');
    }
};
