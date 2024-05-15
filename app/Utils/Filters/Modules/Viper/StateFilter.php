<?php

namespace App\Utils\Filters\Modules\Viper;

class StateFilter extends Filter
{
    protected $safeParam = [
        'nameState' => ['eq', 'cont'],
    ];
    protected $columnMap = [
        'nameState' => 'name',
    ];
    protected $operatorMap = [
        'eq' => '=',
        'cont' => 'ilike',
    ];
}
