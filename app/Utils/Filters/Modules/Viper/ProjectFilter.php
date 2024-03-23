<?php

namespace App\Utils\Filters\Modules\Viper;


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
