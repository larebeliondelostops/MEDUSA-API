<?php

namespace App\Interfaces\Modules\Viper;

use App\DTOs\Viper\Milestone\MilestoneDTO;

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
     * @param  MilestoneDTO  $milestoneDTO
     * @return MilestoneDTO
     */
    public function createNewMilestone(MilestoneDTO $milestoneDTO): MilestoneDTO;

    /**
     * Actualiza un hito existente.
     *
     * @param  MilestoneDTO  $milestoneDTO
     * @param  int  $id
     * @return MilestoneDTO
     */
    public function updateMilestone(MilestoneDTO $milestoneDTO, int $id): MilestoneDTO;

    /**
     * Obtiene todos los hitos asociados a un proyecto específico.
     *
     * @param  int  $projectId
     * @return array de MilestoneDTO
     */
    public function getAllMilestonesByProject(int $projectId): array;

    /**
     * Obtiene un hito específico por su ID.
     *
     * @param  int  $id
     * @return MilestoneDTO
     */
    public function getMilestone(int $id): MilestoneDTO;

    /**
     * Elimina un hito por su ID.
     *
     * @param  int  $id
     * @return MilestoneDTO
     */
    public function deleteMilestone(int $id): MilestoneDTO;
}
