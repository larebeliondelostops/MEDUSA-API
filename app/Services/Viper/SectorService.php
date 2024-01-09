<?php

namespace App\Services\Viper;

use App\DTOs\Viper\SectorDTO;
use App\Interfaces\Viper\SectorInterface;
use App\Models\Viper\Sector;

/**
 * Servicio para manejar operaciones relacionadas con sectores.
 *
 * Este servicio implementa la interfaz SectorInterface y es responsable
 * de realizar operaciones como la obtención de todos los sectores.
 *
 * @package App\Service\Viper
 */
class SectorService implements SectorInterface
{
    /**
     * Obtiene todos los sectores existentes.
     *
     * @return SectorDTO Un objeto SectorDTO que representa todos los sectores.
     */
    public function getAllSectors()
    {
        $sectors = Sector::pluck('name', 'id');
        return new SectorDTO($sectors->toArray());
    }
}
