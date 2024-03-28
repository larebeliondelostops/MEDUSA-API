<?php

namespace App\Interfaces\Modules\Viper;

use Illuminate\Support\Collection;

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
     * @param Collection $sector Collection que contiene la información del sector a crear.
     * @return Collection Collection del sector creado
     */
    public function createNewSector(Collection $sector) :Collection;

    /**
     * Actualiza un sector existente.
     *
     * @param Collection $sector Collection que contiene la información actualizada del sector.
     * @param int $id Identificador único del sector a actualizar.
     * @return Collection Collection del sector actualizado.
     */
    public function updateSector(Collection $sector, int $id): Collection;

    /**
     * Obtiene todos los sectores existentes.
     *
     * @return Collection Collection de Collections que representando todos los sectores.
     */
    public function getAllSectors(): Collection;

    /**
     * Elimina un sector por su identificador único.
     *
     * @param int $id Identificador único del sector a eliminar.
     * @return Collection Collection del sector eliminado.
     */
    public function deleteSector(int $id): Collection;

    /**
     * Obtiene un alcance por su identificador único.
     *
     * @param int $Id Identificador único del alcance.
     * @return Collection Collection del alcance encontrado.
     */
    public function getSectorById(int $id) : Collection;
}
