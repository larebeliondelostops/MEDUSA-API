<?php

namespace App\Services\Viper;

use App\DTOs\Viper\SpecificObjective\SpecificObjectiveDTO;
use App\Interfaces\Viper\SpecificObjectiveInterface;
use App\Models\Viper\Scope;
use App\Models\Viper\SpecificObjective;
use Illuminate\Database\Eloquent\Collection;

/**
 * Servicio para manejar operaciones relacionadas con objetivos específicos de alcances.
 *
 * Este servicio implementa la interfaz SpecificObjectiveInterface y es responsable de realizar operaciones
 * como la creación, actualización, recuperación y eliminación de objetivos específicos de alcances.
 *
 * @package App\Services\Viper
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright 2024 Ignicion S.A.S.
 * @version v1.0.0
 */
class SpecificObjectiveService implements SpecificObjectiveInterface
{
    /**
     * Crea un nuevo objetivo específico.
     *
     * @param SpecificObjectiveDTO $specificObjectiveDTO DTO del objetivo específico a crear.
     * @return SpecificObjectiveDTO
     */
    public function createNewSpecificObjective(SpecificObjectiveDTO $specificObjectiveDTO): SpecificObjectiveDTO
    {
        $specificObjective = new SpecificObjective();
        $specificObjective->fill($specificObjectiveDTO->toArray());
        $specificObjective->save();
        return New SpecificObjectiveDTO($specificObjective->toArray());
    }

    /**
     * Actualiza un objetivo específico existente.
     *
     * @param SpecificObjectiveDTO $specificObjectiveDTO DTO con la información actualizada del objetivo específico.
     * @param int $id Identificador único del objetivo específico a actualizar.
     * @return void
     */
    public function updateSpecificObjective(SpecificObjectiveDTO $specificObjectiveDTO, int $id): SpecificObjectiveDTO
    {
        $specificObjective = SpecificObjective::findOrFail($id);
        $data = $specificObjectiveDTO->toArray();
        $specificObjective->fill($data);
        $specificObjective->save();
        return New SpecificObjectiveDTO($specificObjective->toArray());
    }

    /**
     * Obtiene todos los objetivos específicos asociados a un alcance.
     *
     * @param int $scopeId Identificador único del alcance.
     * @return array Arreglo de objetivos específicos asociados al alcance.
     */
    public function getAllSpecificObjectiveByScope(int $id): array
    {
        $specificObjectives = SpecificObjective::where('scope_id', $id)->get()->toArray();
        return $specificObjectives;
    }

    /**
     * Obtiene un objetivo específico por su identificador único.
     *
     * @param int $specificObjectiveId Identificador único del objetivo específico.
     * @return SpecificObjectiveDTO DTO del objetivo específico encontrado.
     */
    public function getSpecificObjective(int $id): SpecificObjectiveDTO
    {
        $specificObjective = SpecificObjective::findOrFail($id);
        return new SpecificObjectiveDTO($specificObjective->toArray());
    }

    /**
     * Elimina un objetivo específico por su identificador único.
     *
     * @param int $id Identificador único del objetivo específico a eliminar.
     * @return SpecificObjectiveDTO DTO del objetivo específico eliminado.
     */
    public function deleteSpecificObjective(int $id): SpecificObjectiveDTO
    {
        $specificObjective = SpecificObjective::findOrFail($id);
        $specificObjectiveDTO = new SpecificObjectiveDTO($specificObjective->toArray());
        $specificObjective->delete();

        return $specificObjectiveDTO;
    }

    /**
     * Obtiene todos los objetivos específicos asociados a un alcance.
     *
     * @param int $scopeId Identificador único del alcance.
     * @return Collection Collection de objetivos específicos asociados al alcance.
     */
    public function getAllSpecificObjectiveByProject(int $projectId)
    {
        $scope = Scope::where( 'project_id', $projectId )->firstOrFail();
        $specificObjectiveGot = SpecificObjective::where('scope_id', $scope->id)->get();
        $specificObjectives = $specificObjectiveGot->transform(
            function (SpecificObjective $specificObjective)
            {
                return collect($specificObjective);
            }
        );
        return $specificObjectives;
    }
}
