<?php

namespace App\Utils\Viper\Filters;

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
