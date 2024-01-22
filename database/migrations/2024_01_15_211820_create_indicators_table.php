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
        Schema::create('indicators', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('start_year_of_goal');
            $table->bigInteger('end_year_goal');
            $table->bigInteger('target_value');
            $table->bigInteger('progress');
            $table->double('percentage_completed');
            $table->boolean('is_main');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('measurement_unit_id');
            
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('measurement_unit_id')->references('id')->on('measurement_units')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('indicators');
    }
};
