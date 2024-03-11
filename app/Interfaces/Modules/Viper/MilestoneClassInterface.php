<?php

namespace App\Interfaces\Modules\Viper;

use Illuminate\Support\Collection;

/**
 * Interfaz para gestionar operaciones relacionadas con las clases de hitos en el sistema Viper.
 *
 * @package App\Interfaces\Viper
 * @author     Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
interface MilestoneClassInterface
{
    /**
     * Crea una nueva clase de hito.
     *
     * @param  Collection  $milestoneClass Collection que contiene la información de la clase de hito a crear.
     * @return Collection Collection de la clase de hito creado.
     */
    public function createNewMilestoneClass(Collection $milestoneClass): Collection;

    /**
     * Actualiza una clase de hito existente.
     *
     * @param  Collection  $milestoneClass Collection que contiene la información de la clase de hito a actualizar
     * @param  int  $id Identificador único de la clase de hito a actualizar.
     * @return Collection Collection de la clase de hito actualizado.
     */
    public function updateMilestoneClass(Collection $milestoneClass, int $id): Collection;

    /**
     * Obtiene todas las clases de hitos.
     *
     * @return Collection Collection de Collections aociados a la clase de hito.
     */
    public function getAllMilestoneClasses(): Collection;

    /**
     * Obtiene una clase de hito específica por su ID.
     *
     * @param  int  $id Identificador único de la clase de hito.
     * @return Collection Collection de la clase de hito econtrado.
     */
    public function getMilestoneClass(int $id): Collection;

    /**
     * Elimina una clase de hito por su ID.
     *
     * @param  int  $id Identificador único del objetivo específico a eliminar.
     * @return Collection Collection de la clase de hito eliminado
     */
    public function deleteMilestoneClass(int $id): Collection;
}
