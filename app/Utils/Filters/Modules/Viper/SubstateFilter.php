<?php

namespace App\Utils\Filters\Modules\Viper;

class SubstateFilter extends Filter
{
    protected $safeParam = [
        'state_id' => ['eq'],
    ];
    protected $columnMap = [];
    protected $operatorMap = [
        'eq' => '=',
    ];
}
