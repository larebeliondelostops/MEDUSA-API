<?php

namespace App\Interfaces\Viper;

use App\DTOs\Viper\MilestoneSubclass\MilestoneSubclassDTO;

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
     * @param  MilestoneSubclassDTO  $milestoneSubclassDTO
     * @return MilestoneSubclassDTO
     */
    public function createNewMilestoneSubclass(MilestoneSubclassDTO $milestoneSubclassDTO): MilestoneSubclassDTO;

    /**
     * Actualiza una subclase de hito existente.
     *
     * @param  MilestoneSubclassDTO  $milestoneSubclassDTO
     * @param  int  $id
     * @return MilestoneSubclassDTO
     */
    public function updateMilestoneSubclass(MilestoneSubclassDTO $milestoneSubclassDTO, int $id): MilestoneSubclassDTO;

    /**
     * Obtiene todas las subclases de hitos asociadas a una clase de hito específica.
     *
     * @param  int  $milestoneClassId
     * @return array de MilestoneSubclassDTO
     */
    public function getAllMilestoneSubclassesByMilestoneClass(int $milestoneClassId): array;

    /**
     * Obtiene todas las subclases de hitos.
     *
     * @param  int  $milestoneClassId
     * @return array de MilestoneSubclassDTO
     */
    public function getAllMilestoneSubclasses(): array;

    /**
     * Obtiene una subclase de hito específica por su ID.
     *
     * @param  int  $id
     * @return MilestoneSubclassDTO
     */
    public function getMilestoneSubclass(int $id): MilestoneSubclassDTO;

    /**
     * Elimina una subclase de hito por su ID.
     *
     * @param  int  $id
     * @return MilestoneSubclassDTO
     */
    public function deleteMilestoneSubclass(int $id): MilestoneSubclassDTO;
}
