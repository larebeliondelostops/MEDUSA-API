<?php

namespace App\Utils\Filters\Modules\Viper;

use App\Utils\Filters\Modules\Viper\Filter;

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
