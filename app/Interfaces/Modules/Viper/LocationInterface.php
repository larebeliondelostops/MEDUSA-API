<?php

namespace App\Interfaces\Modules\Viper;

use Illuminate\Support\Collection;

interface LocationInterface
{
    public function createNewLocation(Collection $locationRequestDTO) : Collection;
    public function updateLocationById(Collection $locationRequestDTO, int $locationId) : Collection;
    public function getLocationById(int $id) : Collection;
    public function deleteLocationById(int $id) : Collection;
}
