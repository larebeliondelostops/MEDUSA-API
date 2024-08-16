<?php

namespace App\Utils\Filters\Modules\Viper;

class MeasurementUnitFilter extends Filter
{
    protected $safeParam = [
        'nameMeasurementUnit' => ['eq', 'cont'],
    ];
    protected $columnMap = [
        'nameMeasurementUnit' => 'name',
    ];
    protected $operatorMap = [
        'eq' => '=',
        'cont' => 'ilike',
    ];
}
