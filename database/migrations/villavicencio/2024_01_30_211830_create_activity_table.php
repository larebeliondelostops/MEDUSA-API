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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->unsignedBigInteger('number');
            $table->float('total_quantity');
            $table->float('optimistic_time');
            $table->float('most_likely_time');
            $table->float('pessimistic_time');
            $table->float('estimated_time');
            $table->float('total_value');
            $table->boolean('in_kind_contribution');
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedBigInteger('deliverable_id');
            $table->unsignedBigInteger('folder_id');
            $table->unsignedBigInteger('measurement_unit_id');

            $table->foreign('deliverable_id')->references('id')->on('deliverables')->onDelete('cascade');
            $table->foreign('folder_id')->references('id')->on('folders')->onDelete('cascade');
            $table->foreign('measurement_unit_id')->references('id')->on('measurement_units')->onDelete('cascade');

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
        Schema::dropIfExists('activities');
    }
};
