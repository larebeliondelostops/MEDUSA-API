<?php

namespace App\Services\Modules\Viper;

use App\Models\Modules\Viper\Scope;
use Illuminate\Support\Collection;
use App\Interfaces\Modules\Viper\SpecificObjectiveInterface;
use App\Models\Modules\Viper\SpecificObjective;

/**
 * Servicio para manejar operaciones relacionadas con objetivos específicos de alcances.
 *
 * Este servicio implementa la interfaz SpecificObjectiveInterface y es responsable de realizar operaciones
 * como la creación, actualización, recuperación y eliminación de objetivos específicos de alcances.
 *
 * @package App\Services\Modules\Viper
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright 2024 Ignicion S.A.S.
 * @version v1.0.0
 */
class SpecificObjectiveService implements SpecificObjectiveInterface
{
    /**
     * Crea un nuevo objetivo específico.
     *
     * @param Collection $specificObjective Datos del objetivo específico a crear.
     * @return Collection Datos del objetivo específico creado.
     */
    public function createNewSpecificObjective(Collection $specificObjective): Collection
    {
        $newSpecificObjective = new SpecificObjective();
        $newSpecificObjective->fill($specificObjective->toArray());
        $newSpecificObjective->save();
        return collect($newSpecificObjective);
    }

    /**
     * Actualiza un objetivo específico existente.
     *
     * @param Collection $specificObjective Datos con la información actualizada del objetivo específico.
     * @param int $id Identificador único del objetivo específico a actualizar.
     * @return Collection Datos del objetivo específico actualizado.
     */
    public function updateSpecificObjective(Collection $specificObjective, int $id): Collection
    {
        $specificObjectiveUpdate = SpecificObjective::findOrFail($id);
        $data = $specificObjective->toArray();
        $specificObjectiveUpdate->fill($data);
        $specificObjectiveUpdate->save();
        return collect($specificObjectiveUpdate);
    }

    /**
     * Obtiene todos los objetivos específicos asociados a un alcance.
     *
     * @param int $scopeId Identificador único del alcance.
     * @return Collection Collection de objetivos específicos asociados al alcance.
     */
    public function getAllSpecificObjectiveByScope(int $scopeId): Collection
    {
        $specificObjectiveGot = SpecificObjective::where('scope_id', $scopeId)->get();
        $specificObjectives = $specificObjectiveGot->transform(
            function (SpecificObjective $specificObjective)
            {
                return collect($specificObjective);
            }
        );
        return $specificObjectives;
    }

    /**
     * Obtiene un objetivo específico por su identificador único.
     *
     * @param int $id Identificador único del objetivo específico.
     * @return Collection Datos del objetivo específico encontrado.
     */
    public function getSpecificObjective(int $id): Collection
    {
        $specificObjective = SpecificObjective::findOrFail($id);
        return collect($specificObjective);
    }

    /**
     * Elimina un objetivo específico por su identificador único.
     *
     * @param int $id Identificador único del objetivo específico a eliminar.
     * @return Collection Datos del objetivo específico eliminado.
     */
    public function deleteSpecificObjective(int $id): Collection
    {
        $specificObjective = SpecificObjective::findOrFail($id);
        $specificObjective->delete();

        return collect($specificObjective);
    }

    /**
     * Obtiene todos los objetivos específicos asociados a un alcance.
     *
     * @param int $scopeId Identificador único del alcance.
     * @return Collection Collection de objetivos específicos asociados al alcance.
     */
    public function getAllSpecificObjectiveByProject(int $projectId) : Collection
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
