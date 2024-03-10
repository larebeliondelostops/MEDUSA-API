<?php

namespace App\Services\Modules\Viper;

use App\DTOs\Viper\Sector\SectorDTO;
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
     * @param SectorDTO $sectorDTO DTO que contiene la información del sector a crear.
     * @return SectorDTO
     */
    public function createNewSector(SectorDTO $sectorDTO): SectorDTO
    {
        $sector = new Sector($sectorDTO->toArray());
        $sector->save();
        return new SectorDTO($sector->toArray());
    }

    /**
     * Actualiza un sector existente.
     *
     * @param SectorDTO $sectorDTO DTO que contiene la información actualizada del sector.
     * @param int $id Identificador único del sector a actualizar.
     * @return void
     */
    public function updateSector(SectorDTO $sectorDTO, int $id): void
    {
        $sector = Sector::findOrFail($id);
        $sector->fill($sectorDTO->toArray());
        $sector->save();
    }

    /**
     * Obtiene todos los sectores existentes.
     *
     * @return array Un array de objetos SectorDTO representando todos los sectores.
     */
    public function getAllSectors(): array
    {
        $sectors = Sector::all();
        $sectorDTOs = [];

        foreach ($sectors as $sector) {
            $sectorDTOs[] = new SectorDTO($sector->toArray());
        }

        return $sectorDTOs;
    }

    /**
     * Elimina un sector por su identificador único.
     *
     * @param int $id Identificador único del sector a eliminar.
     * @return SectorDTO DTO del sector eliminado.
     * @throws Exception Si el sector no existe.
     */
    public function deleteSector(int $id): SectorDTO
    {
        $sector = Sector::findOrFail($id);
        $sectorDTO = new SectorDTO($sector->toArray());
        $sector->delete();

        return $sectorDTO;
    }

    public function getSectorById(int $id) : SectorDTO
    {
        $sectorFound = Sector::findOrFail($id);
        return new SectorDTO($sectorFound->toArray());
    }
}
