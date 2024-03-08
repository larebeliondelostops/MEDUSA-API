<?php

namespace App\Utils\Viper\Filters;

class FolderFilter extends Filter
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
