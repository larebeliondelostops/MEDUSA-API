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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('number');
            $table->string('name');
            $table->decimal('amount', 21, 2);
            $table->unsignedBigInteger('specific_objective_id');
            $table->unsignedBigInteger('folder_id');
            $table->unsignedBigInteger('measurement_unit_id')->nullable();
            $table->foreign('specific_objective_id')->references('id')->on('specific_objectives')->onDelete('cascade');
            $table->foreign('folder_id')->references('id')->on('folders')->onDelete('cascade');
            $table->foreign('measurement_unit_id')->references('id')->on('measurement_units')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
