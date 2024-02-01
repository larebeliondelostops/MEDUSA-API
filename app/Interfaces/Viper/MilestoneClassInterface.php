<?php

namespace App\Interfaces\Viper;

use App\DTOs\Viper\MilestoneClass\MilestoneClassDTO;

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
     * @param  MilestoneClassDTO  $milestoneClassDTO
     * @return MilestoneClassDTO
     */
    public function createNewMilestoneClass(MilestoneClassDTO $milestoneClassDTO): MilestoneClassDTO;

    /**
     * Actualiza una clase de hito existente.
     *
     * @param  MilestoneClassDTO  $milestoneClassDTO
     * @param  int  $id
     * @return MilestoneClassDTO
     */
    public function updateMilestoneClass(MilestoneClassDTO $milestoneClassDTO, int $id): MilestoneClassDTO;

    /**
     * Obtiene todas las clases de hitos.
     *
     * @return array de MilestoneClassDTO
     */
    public function getAllMilestoneClasses(): array;

    /**
     * Obtiene una clase de hito específica por su ID.
     *
     * @param  int  $id
     * @return MilestoneClassDTO
     */
    public function getMilestoneClass(int $id): MilestoneClassDTO;

    /**
     * Elimina una clase de hito por su ID.
     *
     * @param  int  $id
     * @return MilestoneClassDTO
     */
    public function deleteMilestoneClass(int $id): MilestoneClassDTO;
}
