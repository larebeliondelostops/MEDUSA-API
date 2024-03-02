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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('description');
            $table->date('date');
            $table->string('project_id', 255);
            $table->unsignedBigInteger('document_id')->unique();

            $table->foreign('project_id')->references('bpin')->on('projects')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('reports');
    }
};
