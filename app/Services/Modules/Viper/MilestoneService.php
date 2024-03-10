<?php

namespace App\Services\Modules\Viper;

use App\DTOs\Viper\Milestone\MilestoneDTO;
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
     * @param MilestoneDTO $milestoneDTO Datos del hito a crear.
     * @return MilestoneDTO Hitos creado.
     * @throws Exception Si hay algún error durante la creación.
     */
    public function createNewMilestone(MilestoneDTO $milestoneDTO): MilestoneDTO
    {
        $milestone = new Milestone($milestoneDTO->toArray());
        $milestone->save();
        
        return new MilestoneDTO($milestone->toArray());
    }

    /**
     * Actualiza la información de un hito existente.
     *
     * @param MilestoneDTO $milestoneDTO Datos actualizados del hito.
     * @param int $id Identificador del hito a actualizar.
     * @return MilestoneDTO Hitos actualizado.
     * @throws Exception Si el hito no existe o hay algún error durante la actualización.
     */
    public function updateMilestone(MilestoneDTO $milestoneDTO, int $id): MilestoneDTO
    {
        $milestone = Milestone::findOrFail($id);
        $milestone->fill($milestoneDTO->toArray());
        $milestone->save();
        
        return new MilestoneDTO($milestone->toArray());
    }

    /**
     * Obtiene todos los hitos asociados a un proyecto.
     *
     * @param int $projectId Identificador del proyecto.
     * @return array Listado de hitos del proyecto.
     */
    public function getAllMilestonesByProject(int $projectId): array
    {
        $milestones = Milestone::where('project_id', $projectId)->get();
    
        $milestoneDTOs = $milestones->map(function ($milestone) {
            return new MilestoneDTO($milestone->toArray());
        })->all();
    
        return $milestoneDTOs;
    }

    /**
     * Obtiene la información de un hito específico.
     *
     * @param int $id Identificador del hito.
     * @return MilestoneDTO Información del hito.
     * @throws Exception Si el hito no existe.
     */
    public function getMilestone(int $id): MilestoneDTO
    {
        $milestone = Milestone::findOrFail($id);
        
        return new MilestoneDTO($milestone->toArray());
    }

    /**
     * Elimina un hito específico.
     *
     * @param int $id Identificador del hito a eliminar.
     * @return MilestoneDTO Información del hito eliminado.
     * @throws Exception Si el hito no existe o hay algún error durante la eliminación.
     */
    public function deleteMilestone(int $id): MilestoneDTO
    {
        $milestone = Milestone::findOrFail($id);
        $milestoneDTO = new MilestoneDTO($milestone->toArray());
        $milestone->delete();

        return $milestoneDTO;
    }
}
