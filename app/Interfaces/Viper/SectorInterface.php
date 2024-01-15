<?php

namespace App\Interfaces\Viper;

use App\DTOs\Viper\Sector\SectorDTO;

/**
 * Interfaz para el servicio de manejo de sectores.
 *
 * Define las operaciones necesarias para la gestión de sectores en el sistema.
 * Las operaciones incluyen la creación, actualización, obtención de todos los sectores existentes
 * y eliminación de un sector por su identificador único.
 *
 * @package App\Interfaces\Viper
 * @author     Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
interface SectorInterface {
    /**
     * Crea un nuevo sector.
     *
     * @param SectorDTO $sectorDTO DTO que contiene la información del sector a crear.
     * @return SectotDTO
     */
    public function createNewSector(SectorDTO $sectorDTO) :SectorDTO;

    /**
     * Actualiza un sector existente.
     *
     * @param SectorDTO $sectorDTO DTO que contiene la información actualizada del sector.
     * @param int $id Identificador único del sector a actualizar.
     * @return void
     */
    public function updateSector(SectorDTO $sectorDTO, int $id): void;

    /**
     * Obtiene todos los sectores existentes.
     *
     * @return array Un array de objetos SectorDTO representando todos los sectores.
     */
    public function getAllSectors(): array;

    /**
     * Elimina un sector por su identificador único.
     *
     * @param int $id Identificador único del sector a eliminar.
     * @return SectorDTO DTO del sector eliminado.
     */
    public function deleteSector(int $id): SectorDTO;

    public function getSectorById(int $id) : SectorDTO;
}
