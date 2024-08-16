<?php

namespace App\Utils\Filters\Modules\Viper;

class MunicipalityFilter extends Filter
{
    protected $safeParam = [
        'department_id' => ['eq'],
        'nameMunicipality' => ['eq', 'cont'],
    ];
    protected $columnMap = [
        'nameMunicipality' => 'name',
    ];
    protected $operatorMap = [
        'eq' => '=',
        'cont' => 'ilike',
    ];
}
