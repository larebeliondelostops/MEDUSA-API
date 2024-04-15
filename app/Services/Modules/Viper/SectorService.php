<?php

namespace App\Services\Modules\Viper;

use Illuminate\Support\Collection;
use App\Interfaces\Modules\Viper\SectorInterface;
use App\Models\Modules\Viper\Sector;
use Exception;

/**
 * Servicio de manejo de sectores en el sistema.
 *
 * Implementa la interfaz SectorInterface para definir las operaciones necesarias
 * para la gestión de sectores.
 *
 * @package App\Services\Modules\Viper
 * @author     Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class SectorService implements SectorInterface
{
    /**
     * Crea un nuevo sector.
     *
     * @param Collection $sector Datos que contiene la información del sector a crear.
     * @return Collection Datos del sector recién creado.
     */
    public function createNewSector(Collection $sector): Collection
    {
        $newSector = new Sector($sector->toArray());
        $newSector->save();
        return collect($newSector);
    }

    /**
     * Actualiza un sector existente.
     *
     * @param Collection $sector Datos que contiene la información actualizada del sector.
     * @param int $id Identificador único del sector a actualizar.
     * @return Collection Datos del sector actualizado.
     */
    public function updateSector(Collection $sector, int $id): Collection
    {
        $sectorUpdate = Sector::findOrFail($id);
        $sectorUpdate->fill($sector->toArray());
        $sectorUpdate->save();
        return collect($sectorUpdate);
    }

    /**
     * Obtiene todos los sectores existentes.
     *
     * @return Collection Collection de Collection representando todos los sectores.
     */
    public function getAllSectors(): Collection
    {
        $sectorGot = Sector::all();
        $sectors = $sectorGot->transform(
            function(Sector $sector)
            {
                return collect($sector);
            }
        );

        return $sectors;
    }

    /**
     * Elimina un sector por su identificador único.
     *
     * @param int $id Identificador único del sector a eliminar.
     * @return Collection Datos del sector eliminado.
     * @throws Exception Si el sector no existe.
     */
    public function deleteSector(int $id): Collection
    {
        $sector = Sector::findOrFail($id);
        $sector->delete();

        return collect($sector);
    }

    public function getSectorById(int $id) : Collection
    {
        $sectorFound = Sector::findOrFail($id);
        return collect($sectorFound);
    }
}
