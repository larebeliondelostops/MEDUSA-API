<?php

namespace App\Services\Viper;
use App\DTOs\Viper\State\StateDetailDTO;
use App\DTOs\Viper\State\StateDTO;
use App\DTOs\Viper\Substate\SubstateDTO;
use App\Interfaces\Viper\StateInterface;
use App\Models\Viper\State;
use App\Models\Viper\Substate;

/**
 * Servicio para la gestión de estados en el módulo VIPER.
 *
 * Este servicio implementa la interfaz StateInterface, proporcionando la lógica de negocio
 * para la gestión de estados. Incluye operaciones para la creación, actualización, eliminación,
 * y recuperación de estados y sus detalles.
 *
 * @package    App\Services\Viper
 * @copyright  2024 Ignicion S.A.S.
 * @author     Jorge Abella <j0rg3.4b3ll4@gmail.com>
 * @version    v1.0.2
 */
class StateService implements StateInterface
{
     /**
     * Crea un nuevo estado y lo guarda en la base de datos.
     *
     * @param StateDTO $stateDTO DTO con la información del estado a crear.
     * @return StateDTO DTO del estado recién creado.
     */
    public function createNewState(StateDTO $stateDTO) : StateDTO
    {
        $newState = new State($stateDTO->toArray());
        $newState->save();
        return new StateDTO($newState->toArray());
    }

     /**
     * Actualiza un estado existente identificado por su ID.
     *
     * @param int $id ID del estado a actualizar.
     * @param StateDTO $stateDTO DTO con la nueva información del estado.
     * @return StateDTO DTO del estado actualizado.
     */
    public function updateState(int $id, StateDTO $stateDTO) : StateDTO
    {
        $stateGot = State::findOrFail($id);
        $dataNewState = $stateDTO->toArray(except:["id",]); // el id nunca se debe modificar, por eso se elimina por si lo intentan cambiar
        $stateGot->fill($dataNewState);
        $stateGot->save();
        $stateGotDTO = new StateDTO($stateGot->toArray()+['id'=>$id]);
        return $stateGotDTO;
    }

    /**
     * Elimina un estado identificado por su ID y retorna los detalles del estado eliminado.
     *
     * @param int $id ID del estado a eliminar.
     * @return StateDTO DTO del estado eliminado.
     */
    public function deleteState(int $id) : StateDTO
    {
        $stateGot = State::findOrFail($id);
        $stateGotDTO = new StateDTO($stateGot->toArray());
        $stateGot->delete();
        return $stateGotDTO;
    }

    /**
     * Obtiene un estado por su ID y retorna sus detalles.
     *
     * @param int $id ID del estado a recuperar.
     * @return StateDTO DTO del estado solicitado.
     */
    public function getStateById(int $id) : StateDTO
    {
        $stateGot = State::findOrFail($id);
        $stateGotDTO = new StateDTO($stateGot->toArray());
        return $stateGotDTO;
    }

    /**
     * Recupera y retorna todos los estados disponibles en forma de array de DTOs.
     *
     * @return array Array de DTOs de todos los estados.
     */
    public function getAllStates() : array
    {
        $statesGot = State::all();
        $statesDTO = $statesGot->transform(
            function (State $state)
            {
                return new StateDTO($state->toArray());
            }
        )->toArray();
        return $statesDTO;
    }

    /**
     * Recupera y retorna un listado detallado de todos los estados, incluyendo sus subestados.
     *
     * @return array Array de DTOs con detalles de todos los estados y sus subestados.
     */
    public function getAllStatesDetail() : array
    {
        $statesDetail = State::with('substates')->get();
        $statesDetailDTO = $statesDetail->map(
            function (State $state) {
                $state->substates->transform(
                    fn(Substate $substate) => new SubstateDTO($substate->toArray())
                );

                return new StateDetailDTO($state->toArray());
            }
        );

        return $statesDetailDTO->toArray();
    }
}
