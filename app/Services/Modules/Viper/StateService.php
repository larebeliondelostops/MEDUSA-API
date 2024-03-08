<?php

namespace App\Services\Viper;
use App\Interfaces\Viper\StateInterface;
use App\Models\Viper\State;
use App\Models\Viper\Substate;
use Illuminate\Support\Collection;


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
 * @version    v2.0.0
 */
class StateService implements StateInterface
{
    const KEYS_TO_EXCLUDE = ['created_at', 'updated_at', 'deleted_at'];

     /**
     * Crea un nuevo estado y lo guarda en la base de datos.
     *
     * @param Collection $state Data con la información del estado a crear.
     * @return Collection Data del estado recién creado.
     */
    public function createNewState(Collection $state) : Collection
    {
        $newState = new State($state->toArray());
        $newState->save();
        return collect($newState)->except(self::KEYS_TO_EXCLUDE);
    }

     /**
     * Actualiza un estado existente identificado por su ID.
     *
     * @param int $id ID del estado a actualizar.
     * @param Collection $state Data con la nueva información del estado.
     * @return Collection Data del estado actualizado.
     */
    public function updateState(int $id, Collection $state) : Collection
    {
        $stateGot = State::findOrFail($id);
        $dataNewState = $state->toArray(); // el id nunca se debe modificar, por eso se elimina por si lo intentan cambiar
        $stateGot->fill($dataNewState);
        $stateGot->save();
        return collect($stateGot)->except(self::KEYS_TO_EXCLUDE);
    }

    /**
     * Elimina un estado identificado por su ID y retorna los detalles del estado eliminado.
     *
     * @param int $id ID del estado a eliminar.
     * @return Collection Data del estado eliminado.
     */
    public function deleteState(int $id) : Collection
    {
        $stateGot = State::findOrFail($id);
        $stateGot->delete();
        return collect($stateGot)->except(self::KEYS_TO_EXCLUDE);
    }

    /**
     * Obtiene un estado por su ID y retorna sus detalles.
     *
     * @param int $id ID del estado a recuperar.
     * @return Collection Data del estado solicitado.
     */
    public function getStateById(int $id) : Collection
    {
        $stateGot = State::findOrFail($id);
        return collect($stateGot)->except(self::KEYS_TO_EXCLUDE);
    }

    /**
     * Recupera y retorna todos los estados disponibles en forma de array.
     *
     * @return Collection Array de s de todos los estados.
     */
    public function getAllStates() : Collection
    {
        $statesGot = State::all();
        $states = $statesGot->transform(
            function (State $state)
            {
                return collect($state)->except(self::KEYS_TO_EXCLUDE);
            }
        );
        return $states;
    }

    /**
     * Recupera y retorna un listado detallado de todos los estados, incluyendo sus subestados.
     *
     * @return Collection Collection de s con detalles de todos los estados y sus subestados.
     */
    public function getAllStatesDetail() : Collection
    {
        $statesDetail = State::with('substates')->get();
        $statesDetail = $statesDetail->map(
            function (State $state) {
                $state->substates->transform(
                    fn(Substate $substate) => collect($substate)->except(self::KEYS_TO_EXCLUDE)
                );

                return collect($state)->except(self::KEYS_TO_EXCLUDE);
            }
        );

        return $statesDetail;
    }
}
