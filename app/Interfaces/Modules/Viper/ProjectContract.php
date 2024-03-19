<?php

namespace App\Interfaces\Modules\Viper;

use Illuminate\Support\Collection;

interface ProjectContractInterface {

    public function createProjectContract(Collection $projectContract): Collection;
}
