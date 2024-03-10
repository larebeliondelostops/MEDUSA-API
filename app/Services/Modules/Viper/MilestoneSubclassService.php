<?php

namespace App\Services\Modules\Viper;

use App\DTOs\Viper\MilestoneSubclass\MilestoneSubclassDTO;
use App\Interfaces\Modules\Viper\MilestoneSubclassInterface;
use App\Models\Modules\Viper\MilestoneSubclass;
use Exception;

/**
 * Servicio para la gestión de subclases de hitos en el sistema Viper.
 *
 * Este servicio implementa la interfaz MilestoneSubclassInterface y proporciona
 * métodos para la creación, actualización, obtención y eliminación de subclases de hitos.
 *
 * @package App\Services\Modules\Viper
 * @author     Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0 */
class MilestoneSubclassService implements MilestoneSubclassInterface
{

    /**
     * Crea una nueva subclase de hitos.
     *
     * @param  MilestoneSubclassDTO  $milestoneSubclassDTO
     * @return MilestoneSubclassDTO
     */
    public function createNewMilestoneSubclass(MilestoneSubclassDTO $milestoneSubclassDTO): MilestoneSubclassDTO
    {
        $milestoneSubclass = new MilestoneSubclass($milestoneSubclassDTO->toArray());
        $milestoneSubclass->save();
        
        return new MilestoneSubclassDTO($milestoneSubclass->toArray());
    }

    /**
     * Actualiza una subclase de hitos existente.
     *
     * @param  MilestoneSubclassDTO  $milestoneSubclassDTO
     * @param  int  $id
     * @return MilestoneSubclassDTO
     */
    public function updateMilestoneSubclass(MilestoneSubclassDTO $milestoneSubclassDTO, int $id): MilestoneSubclassDTO
    {
        $milestoneSubclass = MilestoneSubclass::findOrFail($id);
        $milestoneSubclass->fill($milestoneSubclassDTO->toArray());
        $milestoneSubclass->save();
        
        return new MilestoneSubclassDTO($milestoneSubclass->toArray());
    }

    /**
     * Obtiene todas las subclases de hitos asociadas a una clase de hitos específica.
     *
     * @param  int  $milestoneClassId
     * @return array de MilestoneSubclassDTO
     */
    public function getAllMilestoneSubclassesByMilestoneClass(int $milestoneClassId): array
    {
        $milestoneSubclasses = MilestoneSubclass::where('milestone_class_id', $milestoneClassId)->get();
    
        $milestoneSubclassDTOs = $milestoneSubclasses->map(function ($milestoneSubclass) {
            return new MilestoneSubclassDTO($milestoneSubclass->toArray());
        })->all();
    
        return $milestoneSubclassDTOs;
    }

    /**
     * Obtiene todas las subclases de hitos.
     *
     * @return array de MilestoneSubclassDTO
     */
    public function getAllMilestoneSubclasses(): array
    {
        $milestoneSubclasses = MilestoneSubclass::all();
        $milestoneSubclassDTOs = [];

        foreach ($milestoneSubclasses as $milestoneSubclass) {
            $milestoneSubclassDTOs[] = new MilestoneSubclassDTO($milestoneSubclass->toArray());
        }

        return $milestoneSubclassDTOs;
    }

    /**
     * Obtiene una subclase de hitos por su ID.
     *
     * @param  int  $id
     * @return MilestoneSubclassDTO
     */
    public function getMilestoneSubclass(int $id): MilestoneSubclassDTO
    {
        $milestoneSubclass = MilestoneSubclass::findOrFail($id);
        
        return new MilestoneSubclassDTO($milestoneSubclass->toArray());
    }

    /**
     * Elimina una subclase de hitos por su ID.
     *
     * @param  int  $id
     * @return MilestoneSubclassDTO
     */
    public function deleteMilestoneSubclass(int $id): MilestoneSubclassDTO
    {
        $milestoneSubclass = MilestoneSubclass::findOrFail($id);
        $milestoneSubclassDTO = new MilestoneSubclassDTO($milestoneSubclass->toArray());
        $milestoneSubclass->delete();

        return $milestoneSubclassDTO;
    }
}
