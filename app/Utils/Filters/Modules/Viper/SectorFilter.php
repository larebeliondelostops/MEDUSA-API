<?php

namespace App\Utils\Filters\Modules\Viper;

class SectorFilter extends Filter
{
    protected $safeParam = [
        'nameSector' => ['eq', 'cont'],
    ];
    protected $columnMap = [
        'nameSector' => 'name',
    ];
    protected $operatorMap = [
        'eq' => '=',
        'cont' => 'ilike',
    ];
}
