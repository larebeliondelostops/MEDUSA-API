<?php

namespace App\Interfaces\Modules\Viper;

use Illuminate\Support\Collection;

interface ActivityControlInterface {
    
    public function getAllActivityControlByProject(String $projectId): Collection;
}
