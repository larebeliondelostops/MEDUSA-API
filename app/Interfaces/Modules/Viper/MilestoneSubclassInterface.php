<?php

namespace App\Interfaces\Modules\Viper;

use Illuminate\Support\Collection;

/**
 * Interfaz para gestionar operaciones relacionadas con las subclases de hitos en el sistema Viper.
 *
 * @package App\Interfaces\Viper
 * @author     Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
interface MilestoneSubclassInterface
{
    /**
     * Crea una nueva subclase de hito.
     *
     * @param  Collection  $milestoneSubclass Collection que contiene la información de la subclase de hito a crear.
     * @return Collection Collection de la subclase de hito creado.
     */
    public function createNewMilestoneSubclass(Collection $milestoneSubclass): Collection;

    /**
     * Actualiza una subclase de hito existente.
     *
     * @param  Collection  $milestoneSubclass Collection que contiene la información actualizada de la subclase de hito
     * @param  int  $id Identificador único de la subclase de hito a actualizar.
     * @return Collection Collection de la subclase de hito actualizado.
     */
    public function updateMilestoneSubclass(Collection $milestoneSubclass, int $id): Collection;

    /**
     * Obtiene todas las subclases de hitos asociadas a una clase de hito específica.
     *
     * @param  int  $milestoneClassId Identificador único de la clase hito.
     * @return Collection Collection de Collections asociados a la subclase de hito.
     */
    public function getAllMilestoneSubclassesByMilestoneClass(int $milestoneClassId): Collection;

    /**
     * Obtiene todas las subclases de hitos.
     *
     * @return Collection Collection de Collections asociados a las subclases de hitos.
     */
    public function getAllMilestoneSubclasses(): Collection;

    /**
     * Obtiene una subclase de hito específica por su ID.
     *
     * @param  int  $id Identificador únido de la subclase de hito.
     * @return Collection Collection de la subclase de hito entontrado.
     */
    public function getMilestoneSubclass(int $id): Collection;

    /**
     * Elimina una subclase de hito por su ID.
     *
     * @param  int  $id Identificador único de la subclase de hito a eliminar.
     * @return Collection Collection de la subclase de hito eliminado.
     */
    public function deleteMilestoneSubclass(int $id): Collection;
}
