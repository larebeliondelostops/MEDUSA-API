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
        Schema::create('deliverables', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->string('name', 256);
            $table->integer('activity_quantity');
            $table->decimal('value', 21, 2);

            $table->date('min_date')->nullable(true)->default(null);
            $table->date('max_date')->nullable(true)->default(null);

            $table->integer('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            $table->integer('deliverable_id')->nullable();
            $table->foreign('deliverable_id')->references('id')->on('deliverables')->onDelete('cascade');

            $table->integer('folder_id');
            $table->foreign('folder_id')->references('id')->on('folders');

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
        Schema::dropIfExists('deliverables');
    }
};
