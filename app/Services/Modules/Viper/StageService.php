<?php

namespace App\Services\Modules\Viper;

use App\Interfaces\Modules\Viper\StageInterface;
use App\Models\Modules\Viper\Stage;
use App\Models\Modules\Viper\StageRelationship;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

/**
 * Servicio para manejar operaciones relacionadas con las etaptas de los proyectos.
 *
 * Este servicio implementa la interfaz StageInterface y es responsable
 * de realizar operaciones como la creación, actualización, recuperación
 * y eliminación de las etapas en los proyectos.
 * @package    App\Service\Viper
 * @author     Daniel Alférez <dan.alferez1@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class StageService implements StageInterface
{
    /**
     * Obtiene todas las etapas existentes.
     *
     * @return Collection Collection de Collections que representan las etapas.
     */
    public function getAllStages(): Collection
    {
        $stageGot = Stage::all();
        $stages = $stagesGot->transform(function ($stage) {
            return collect($stage);
        });

        return collect($stages);
    }

    /**
     * Almacena una nueva etapa en la base de datos.
     *
     * @param Collection $stage Collection que contiene los datos de la nueva etapa.
     * @return Collection Collection que representa la etapa recién creada.
     */
    public function storeStage(Collection $stage): Collection
    {

        $newStage = Stage::create($stage->toArray());

        return collect($newStage);
    }

    /**
     * Actualiza los datos de una etapa existente.
     *
     * @param int $stageId Identificador único de la etapa que se va a actualizar.
     * @param Collection $stage Collection que contiene los nuevos datos de la etapa.
     * @return Collection Collection que representa la etapa actualizada.
     */
    public function updateStage($stageId, Collection $stage): Collection
    {
        $stageUpadte = Stage::findOrFail($stageId);
        $stage->update($stage->toArray());
        return collect($stageUpdate); 
    }

    /**
     * Elimina una etapa existente.
     *
     * @param int $stageId Identificador único de la etapa que se va a eliminar.
     * @return Collection Collection que representa la etapa eliminada.
     */
    public function deleteStage($stageId):Collection
    {
        // Encuentra la etapa por su ID y elimínala
        $stage = Stage::findOrFail($stageId);
        $stage->delete();
    }
}
