<?php

namespace App\Utils\Filters\Modules\Viper;

class DepartmentFilter extends Filter
{
    protected $safeParam = [
        'nameDepartment' => ['eq', 'cont'],
    ];
    protected $columnMap = [
        'nameDepartment' => 'name',
    ];
    protected $operatorMap = [
        'eq' => '=',
        'cont' => 'ilike',
    ];
}
