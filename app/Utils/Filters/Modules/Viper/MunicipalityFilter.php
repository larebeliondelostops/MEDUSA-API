<?php

namespace App\Utils\Filters\Modules\Viper;

class MunicipalityFilter extends Filter
{
    protected $safeParam = [
        'department_id' => ['eq'],
    ];
    protected $columnMap = [];
    protected $operatorMap = [
        'eq' => '=',
    ];
}
