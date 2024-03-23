<?php

namespace App\Utils\Filters\Modules\Viper;

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
