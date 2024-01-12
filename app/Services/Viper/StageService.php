<?php

namespace App\Services\Viper;

use App\DTOs\Viper\Stage\StageDTO;
use App\Interfaces\Viper\StageInterface;
use App\Models\Viper\Stage;
use App\Models\Viper\StageRelationship;
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
     * @return Collection|StageDTO[] Colección de objetos StageDTO que representan las etapas.
     */
    public function getAllStages()
    {
        $stages = Stage::all();
        $stageDTOs = $stages->transform(function ($stage) {
            return new StageDTO($stage->toArray());
        });

        return $stageDTOs;
    }

    /**
     * Almacena una nueva etapa en la base de datos.
     *
     * @param StageDTO $stageDTO Objeto StageDTO que contiene los datos de la nueva etapa.
     * @return StageDTO Objeto StageDTO que representa la etapa recién creada.
     */
    public function storeStage(StageDTO $stageDTO)
    {
        // Crea una nueva instancia del modelo Stage y guarda los datos
        $newStage = Stage::create([
            'name' => $stageDTO->name,
        ]);

        return new StageDTO($newStage->toArray());
    }

    /**
     * Actualiza los datos de una etapa existente.
     *
     * @param int $stageId ID de la etapa que se va a actualizar.
     * @param StageDTO $stageDTO Objeto StageDTO que contiene los nuevos datos de la etapa.
     * @return StageDTO Objeto StageDTO que representa la etapa actualizada.
     * @throws \Exception Se arroja si la etapa no se encuentra.
     */
    public function updateStage($stageId, StageDTO $stageDTO)
    {
        // Encuentra la etapa por su ID
        $stage = Stage::find($stageId);
        
        if ($stage) {
            // Actualiza los datos de la etapa
            $stage->update([
                'name' => $stageDTO->name,
            ]);
            return new StageDTO($stage->toArray()); 
        }
        throw new \Exception('Etapa no encontrada', 404);
    }

    /**
     * Elimina una etapa existente.
     *
     * @param int $stageId ID de la etapa que se va a eliminar.
     * @throws \Exception Se arroja si la etapa no se encuentra.
     */
    public function deleteStage($stageId)
    {
        // Encuentra la etapa por su ID y elimínala
        $stage = Stage::find($stageId);

        if ($stage) {
            $stage->delete();
            return; 
        }
        throw new \Exception('Etapa no encontrada', 404);
    }

}
