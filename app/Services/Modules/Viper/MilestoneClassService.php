<?php

namespace App\Services\Modules\Viper;

use App\DTOs\Viper\MilestoneClass\MilestoneClassDTO;
use App\Interfaces\Modules\Viper\MilestoneClassInterface;
use App\Models\Modules\Viper\MilestoneClass;
use Exception;

/**
 * Servicio para la gestión de clases de hitos en el sistema Viper.
 *
 * Este servicio implementa la interfaz MilestoneClassInterface y proporciona lógica de negocio
 * para la creación, actualización, obtención y eliminación de clases de hitos.
 *
 * @package App\Services\Modules\Viper
 * @author     Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class MilestoneClassService implements MilestoneClassInterface
{
    /**
     * Crea una nueva clase de hito.
     *
     * @param  MilestoneClassDTO  $milestoneClassDTO
     * @return MilestoneClassDTO
     */
    public function createNewMilestoneClass(MilestoneClassDTO $milestoneClassDTO): MilestoneClassDTO
    {
        $milestoneClass = new MilestoneClass($milestoneClassDTO->toArray());
        $milestoneClass->save();

        return new MilestoneClassDTO($milestoneClass->toArray());
    }

    /**
     * Actualiza una clase de hito existente.
     *
     * @param  MilestoneClassDTO  $milestoneClassDTO
     * @param  int  $id
     * @return MilestoneClassDTO
     */
    public function updateMilestoneClass(MilestoneClassDTO $milestoneClassDTO, int $id): MilestoneClassDTO
    {
        
        $milestoneClass = MilestoneClass::findOrFail($id);
        $milestoneClass->fill($milestoneClassDTO->toArray());
        $milestoneClass->save();

        return new MilestoneClassDTO($milestoneClass->toArray());
    }

    /**
     * Obtiene todas las clases de hitos.
     *
     * @return array de MilestoneClassDTO
     */
    public function getAllMilestoneClasses(): array
    {
        $milestoneClasses = MilestoneClass::all();
        $milestoneClassDTOs = [];

        foreach ($milestoneClasses as $milestoneClass) {
            $milestoneClassDTOs[] = new MilestoneClassDTO($milestoneClass->toArray());
        }

        return $milestoneClassDTOs;
    }

    /**
     * Obtiene una clase de hito específica por su ID.
     *
     * @param  int  $id
     * @return MilestoneClassDTO
     */
    public function getMilestoneClass(int $id): MilestoneClassDTO
    {

        $milestoneClass = MilestoneClass::findOrFail($id);

        return new MilestoneClassDTO($milestoneClass->toArray());
    }

    /**
     * Elimina una clase de hito por su ID.
     *
     * @param  int  $id
     * @return MilestoneClassDTO
     */
    public function deleteMilestoneClass(int $id): MilestoneClassDTO
    {
        $milestoneClass = MilestoneClass::findOrFail($id);
        $milestoneClassDTO = new MilestoneClassDTO($milestoneClass->toArray());
        $milestoneClass->delete();

        return $milestoneClassDTO;
    }
}
