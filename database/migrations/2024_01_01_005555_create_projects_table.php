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
        Schema::create('projects', function (Blueprint $table) {
            $table->string('bpin', 255)->primary();
            $table->string('name', 100);
            $table->string('ocad', 100);
            $table->string('state', 100);
            $table->string('substate', 100);
            $table->decimal('total_value', 15, 2);
            $table->decimal('requested_value', 15, 2);
            $table->decimal('executed_value', 15, 2);
            $table->float('physical_progress');
            $table->float('financial_progress');
            $table->string('responsible_entity', 255);
            $table->unsignedBigInteger('sector_id');

            $table->string('type_location');
            $table->double('latitude_location', 10, 6);
            $table->double('longitude_location', 10, 6);

            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('id')->on('departments');

            $table->unsignedBigInteger('municipality_id');
            $table->foreign('municipality_id')->references('id')->on('municipalities');

            $table->integer('beneficiaries');
            $table->string('planner', 255);
            $table->date('execution_approval_date');
            $table->date('completion_date')->nullable();
            $table->date('start_date_execution_phase')->nullable();
            $table->integer('project_duration_in_months');
            $table->integer('reporting_frequency');
            $table->string('general_objective', 255);
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
        Schema::dropIfExists('projects');
    }
};
