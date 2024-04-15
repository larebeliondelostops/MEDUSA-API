<?php

namespace App\Services\Modules\Viper;

use App\Interfaces\Modules\Viper\SubstateInterface;
use App\Models\Modules\Viper\Substate;
use Illuminate\Support\Collection;

/**
 * Servicio para manejar operaciones relacionadas con las etaptas de los proyectos.
 *
 * Este servicio implementa la interfaz SubstateInterface y es responsable
 * de realizar operaciones como la creación, actualización, recuperación
 * y eliminación de los subestados en los proyectos.
 * @package    App\Service\Viper
 * @author     Daniel Alférez <dan.alferez1@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class SubstateService implements SubstateInterface
{
    /**
     * Obtiene todas los subestados existentes.
     *
     * @return Collection Colección de objetos SubstateDTO que representan los subestados.
     */
    public function getAllSubstates() : Collection
    {
        $substates = Substate::with(['state'])->get();
        return collect($substates);
    }

    /**
     * Almacena un nuevo subestado en la base de datos.
     *
     * @param Collection $substateDTO Objeto SubstateDTO que contiene los datos de la nuevo subestado.
     * @return Collection Objeto SubstateDTO que representa el subestado recién creada.
     */
    public function storeSubstate(Collection $substateDTO) : Collection
    {
        // Crea una nueva instancia del modelo Substate y guarda los datos

        $substate = new Substate();
        $substate->fill($substateDTO->toArray());
        $substate->save();

        return collect($substate);
    }

    /**
     * Actualiza los datos de un subestado existente.
     *
     * @param int $substateId ID del subestado que se va a actualizar.
     * @param Collection $substateDTO Objeto SubstateDTO que contiene los nuevos datos del subestado.
     * @return Collection Objeto SubstateDTO que representa el subestado actualizada.
     * @throws \Exception Se arroja si el subestado no se encuentra.
     */
    public function updateSubstate(int $substateId, Collection $substateDTO) : Collection
    {
        // Encuentra el subestado por su ID
        $substate = Substate::findOrFail($substateId);
        // Actualiza los datos del subestado
        $substate->update([
            'name' => $substateDTO['name'],
        ]);
        return collect($substate);

    }

    /**
     * Elimina un subestado existente.
     *
     * @param int $substateId ID del subestado que se va a eliminar.
     * @throws \Exception Se arroja si el subestado no se encuentra.
     */
    public function deleteSubstate(int $substateId)
    {
        // Encuentra el subestado por su ID y lo elimina
        $substate = Substate::findOrFail($substateId);
        $substate->delete();
    }


    /**
     * Obtener todos los subestados existentes por estado.
     *
     * @param int $stateId ID del estado con el que se va a realizar la consulta de subestados.
     * @return \Illuminate\Support\Collection Colección de objetos SubstateDTO que representan los subestados.
     */
    public function getAllSubstatesByState(int $stateId) : Collection
    {
        $substates = Substate::where('state_id', $stateId)->get();
        return collect($substates)->except(['state_id']);
    }

    public function getSubstateById(int $id) : Collection
    {
        $substateFound = Substate::findOrFail($id);
        return collect($substateFound);
    }
}
