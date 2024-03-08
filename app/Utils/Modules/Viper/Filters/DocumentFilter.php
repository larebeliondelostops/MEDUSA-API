<?php

namespace App\Utils\Viper\Filters;

class DocumentFilter extends Filter
{
    protected $safeParam = [
        'name' => ['cont'],
        'folder_id' => ['eq']
    ];
    protected $columnMap = [
        'name' => 'name',
        'folder_id' => 'folder_id',
    ];
    protected $operatorMap = [
        'cont' => 'ilike',
        'eq' => '=',
    ];
}
