<?php

namespace App\Utils\Viper\Filters;

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
