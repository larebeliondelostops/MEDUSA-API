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
        Schema::create('milestones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('milestone_classes_id');
            $table->unsignedBigInteger('milestone_subclasses_id');
            $table->date('date');
            $table->string('project_id',255);

            $table->foreign('milestone_classes_id')->references('id')->on('milestone_classes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('milestone_subclasses_id')->references('id')->on('milestone_subclasses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('project_id')->references('bpin')->on('projects')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('milestone');
    }
};
