<?php

namespace App\Services\Viper;

use App\DTOs\Viper\Substate\SubstateDTO;
use App\Interfaces\Viper\SubstateInterface;
use App\Models\Viper\Substate;
use Illuminate\Support\Facades\DB;
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
     * @return Collection|SubstateDTO[] Colección de objetos SubstateDTO que representan los subestados.
     */
    public function getAllSubstates()
    {
        $substates = Substate::all();
        $substateDTOs = $substates->transform(function ($substate) {
            return new SubstateDTO($substate->toArray());
        });

        return $substateDTOs;
    }

    /**
     * Almacena un nuevo subestado en la base de datos.
     *
     * @param SubstateDTO $substateDTO Objeto SubstateDTO que contiene los datos de la nuevo subestado.
     * @return SubstateDTO Objeto SubstateDTO que representa el subestado recién creada.
     */
    public function storeSubstate(SubstateDTO $substateDTO)
    {
        // Crea una nueva instancia del modelo Substate y guarda los datos

        $substate = new Substate();
        $substate->fill($substateDTO->toArray());
        $substate->save();

        return new SubstateDTO($substate->toArray());
    }

    /**
     * Actualiza los datos de un subestado existente.
     *
     * @param int $substateId ID del subestado que se va a actualizar.
     * @param SubstateDTO $substateDTO Objeto SubstateDTO que contiene los nuevos datos del subestado.
     * @return SubstateDTO Objeto SubstateDTO que representa el subestado actualizada.
     * @throws \Exception Se arroja si el subestado no se encuentra.
     */
    public function updateSubstate($substateId, SubstateDTO $substateDTO)
    {
        // Encuentra el subestado por su ID
        $substate = Substate::findOrFail($substateId);
        // Actualiza los datos del subestado
        $substate->update([
            'name' => $substateDTO->name,
        ]);
        return new SubstateDTO($substate->toArray());

    }

    /**
     * Elimina un subestado existente.
     *
     * @param int $substateId ID del subestado que se va a eliminar.
     * @throws \Exception Se arroja si el subestado no se encuentra.
     */
    public function deleteSubstate($substateId)
    {
        // Encuentra el subestado por su ID y lo elimina
        $substate = Substate::findOrFail($substateId);
        $substate->delete();
    }


    /**
     * Obtener todos los subestados existentes por estado.
     *
     * @param int $stateId ID del estado con el que se va a realizar la consulta de subestados.
     * @return \Illuminate\Support\Collection|SubstateDTO[] Colección de objetos SubstateDTO que representan los subestados.
     */
    public function getAllSubstatesByState($stateId)
    {
        $substates = Substate::where('state_id', $stateId)->get();
        $substates = $substates->transform(function ($substate) {
            return (new SubstateDTO($substate->toArray()))->toArray(['state_id']);
        });

        return $substates;
    }

    public function getSubstateById(int $id) : SubstateDTO
    {
        $substateFound = Substate::findOrFail($id);
        return new SubstateDTO($substateFound->toArray());
    }
}
