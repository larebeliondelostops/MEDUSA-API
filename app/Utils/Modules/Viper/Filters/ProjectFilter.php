<?php

namespace App\Utils\Viper\Filters;

use App\Utils\Viper\Filters\Filter;

class ProjectFilter extends Filter
{
    protected $safeParam = [
        'bpin' => ['eq', 'cont'],
        'name' => ['eq', 'cont'],
    ];
    protected $columnMap = [];
    protected $operatorMap = [
        'eq' => '=',
        'cont' => 'like',
    ];

}
