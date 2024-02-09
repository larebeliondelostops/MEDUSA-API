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
        Schema::create('ProbabilisticGrid', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->json('coordinates');
            $table->float('ActualStatePersonalInjuries', 6, 6);
            $table->float('FutureStatePersonalInjuries', 6, 6);
            $table->float('ActualStateTheftResidences', 6, 6);
            $table->float('FutureStateTheftResidences', 6, 6);
            $table->float('ActualStateTheftCommerce', 6, 6);
            $table->float('FutureStateTheftCommerce', 6, 6);
            $table->float('ActualStateTheftAutomotive', 6, 6);
            $table->float('FutureStateTheftAutomotive', 6, 6);
            $table->float('FutureStateTheftMotorcycles', 6, 6);
            $table->float('ActualStateTheftMotorcycles', 6, 6);
            $table->float('ActualStateTheftFinancialEntities', 6, 6);
            $table->float('FutureStateTheftFinancialEntities', 6, 6);
            $table->float('ActualStateHomicide', 6, 6);
            $table->float('FutureStateHomicide', 6, 6);
            $table->float('ActualStateKidnapping', 6, 6);
            $table->float('FutureStateKidnapping', 6, 6);
            $table->float('ActualStateExtortion', 6, 6);
            $table->float('FutureStateExtortion', 6, 6);
            $table->float('ActualStateTerrorism', 6, 6);
            $table->float('FutureStateTerrorism', 6, 6);
            $table->float('ActualStateAverage', 6, 6);
            $table->float('FutureStateAverage', 6, 6);
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
