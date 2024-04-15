<?php

namespace App\Interfaces\Modules\Viper;

use Illuminate\Support\Collection;


/**
 * Interfaz para la gestión de hitos en el sistema Viper.
 *
 * Esta interfaz define los métodos para la creación, actualización, obtención y eliminación de hitos.
 *
 * @author     Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
interface MilestoneInterface
{
    /**
     * Crea un nuevo hito.
     *
     * @param  Collection  $milestone Collectionque contiene la información del hito a crear.
     * @return Collection Collection del hito creado.
     */
    public function createNewMilestone(Collection $milestone): Collection;

    /**
     * Actualiza un hito existente.
     *
     * @param  Collection  $milestone CollectionCollection que contiene la información actualizada del hito.
     * @param  int  $id Identificador único del hito a actualizar
     * @return Collection Collection del hito actualizado.
     */
    public function updateMilestone(Collection $milestone, int $id): Collection;

    /**
     * Obtiene todos los hitos asociados a un proyecto específico.
     *
     * @param  int  $projectId Identificador único del projecto.
     * @return Collection Collection de Collections asociado al hito.
     */
    public function getAllMilestonesByProject(int $projectId): Collection;

    /**
     * Obtiene un hito específico por su ID.
     *
     * @param  int  $id Identificador único del hito.
     * @return Collection Collection del hito encontrado.
     */
    public function getMilestone(int $id): Collection;

    /**
     * Elimina un hito por su ID.
     *
     * @param  int  $id Identificador único del hito a eliminar.
     * @return Collection Collection del hito eliminado
     */
    public function deleteMilestone(int $id): Collection;
}
