<?php 

namespace App\Services\Modules\Viper;

use App\Interfaces\Modules\Viper\StatusInterface;
use App\Models\Modules\Viper\StatusViper;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class StatusService implements StatusInterface
{
    public function getStatusByName(string $name) : Collection
    {
        Log::Info('Buscando estado por nombre: ' . $name);
        $statusFound = StatusViper::where('name', $name)->firstOrFail();
        Log::Info('Estado encontrado: ' . $statusFound);
        return collect($statusFound);
    }
}