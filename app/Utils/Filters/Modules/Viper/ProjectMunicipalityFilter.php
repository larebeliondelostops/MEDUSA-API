<?php

namespace App\Utils\Filters\Modules\Viper;


class ProjectMunicipalityFilter extends Filter
{
    protected $safeParam = [
        'bpin' => ['eq', 'cont'],
    ];
    protected $columnMap = [
        'bpin' => 'project_bpin',
    ];
    protected $operatorMap = [
        'eq' => '=',
        'cont' => 'like',
    ];
}
