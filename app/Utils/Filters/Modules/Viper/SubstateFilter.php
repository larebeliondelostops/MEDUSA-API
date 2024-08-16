<?php

namespace App\Utils\Filters\Modules\Viper;

class SubstateFilter extends Filter
{
    protected $safeParam = [
        'state_id' => ['eq'],
        'nameSubstate' => ['eq', 'cont'],
    ];
    protected $columnMap = [
        'nameSubstate' => 'name',
    ];
    protected $operatorMap = [
        'eq' => '=',
    ];
}
