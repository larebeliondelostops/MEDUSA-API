<?php

namespace App\Utils\Viper\Filters;

class DocumentFilter extends Filter
{
    protected $safeParam = [
        'name' => ['cont'],
        
    ];
    protected $columnMap = [
        'name' => 'name',
    ];
    protected $operatorMap = [
        'cont' => 'ilike',
    ];
}
