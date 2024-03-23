<?php

namespace App\Services\Modules\Viper;

use Illuminate\Support\Collection;
use App\Interfaces\Modules\Viper\MilestoneInterface;
use App\Models\Modules\Viper\Milestone;
use Exception;

/**
 * Class MilestoneService
 *
 * Servicio para gestionar las operaciones CRUD de los hitos (milestones) en el sistema.
 */
class MilestoneService implements MilestoneInterface 
{
    /**
     * Crea un nuevo hito.
     *
     * @param Collection $milestone Datos del hito a crear.
     * @return Collection Datos del hito recién creado.
     */
    public function createNewMilestone(Collection $milestone): Collection
    {
        $newMilestone = new Milestone($milestone->toArray());
        $newMilestone->save();
        
        return collect($newMilestone);
    }

    /**
     * Actualiza la información de un hito existente.
     *
     * @param Collection $milestone Datos actualizados del hito.
     * @param int $id Identificador del hito a actualizar.
     * @return Collection Datos del hito actualizado.
     */
    public function updateMilestone(Collection $milestone, int $id): Collection
    {
        $milestoneUpdate = Milestone::findOrFail($id);
        $milestoneUpdate->fill($milestone->toArray());
        $milestoneUpdate->save();
        
        return collect($milestoneUpdate);
    }

    /**
     * Obtiene todos los hitos asociados a un proyecto.
     *
     * @param int $projectId Identificador del proyecto.
     * @return Collection Listado de hitos del proyecto.
     */
    public function getAllMilestonesByProject(int $projectId): Collection
    {
        $milestoneGot = Milestone::where('project_id', $projectId)->get();
    
        $milestones = $milestoneGot->transform(
            function (Milestone $milestone)
            {
                return collect($milestone);
            }
        );
    
        return $milestones;
    }

    /**
     * Obtiene la información de un hito específico.
     *
     * @param int $id Identificador del hito.
     * @return Collection Información del hito.
     */
    public function getMilestone(int $id): Collection
    {
        $milestone = Milestone::findOrFail($id);
        
        return collect($milestone);
    }

    /**
     * Elimina un hito específico.
     *
     * @param int $id Identificador del hito a eliminar.
     * @return Collection Información del hito eliminado.
     */
    public function deleteMilestone(int $id): Collection
    {
        $milestone = Milestone::findOrFail($id);
        $milestone->delete();

        return collect($milestone);
    }
}
