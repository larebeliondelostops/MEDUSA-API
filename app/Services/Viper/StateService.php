<?php

namespace App\Services\Viper;
use App\DTOs\Viper\State\StateDetailDTO;
use App\DTOs\Viper\State\StateDTO;
use App\DTOs\Viper\Substate\SubstateDTO;
use App\Interfaces\Viper\StateInterface;
use App\Models\Viper\State;
use App\Models\Viper\Substate;

class StateService implements StateInterface
{
    public function createNewState(StateDTO $stateDTO) : StateDTO
    {
        $newState = new State($stateDTO->toArray());
        $newState->save();
        return new StateDTO($newState->toArray());
    }

    public function updateState(int $id, StateDTO $stateDTO) : StateDTO
    {
        $stateGot = State::findOrFail($id);
        $dataNewState = $stateDTO->toArray(except:["id",]); // el id nunca se debe modificar, por eso se elimina por si lo intentan cambiar
        $stateGot->fill($dataNewState);
        $stateGot->save();
        $stateGotDTO = new StateDTO($stateGot->toArray()+['id'=>$id]);
        return $stateGotDTO;
    }

    public function deleteState(int $id) : StateDTO
    {
        $stateGot = State::findOrFail($id);
        $stateGotDTO = new StateDTO($stateGot->toArray());
        $stateGot->delete();
        return $stateGotDTO;
    }

    public function getStateById(int $id) : StateDTO
    {
        $stateGot = State::findOrFail($id);
        $stateGotDTO = new StateDTO($stateGot->toArray());
        return $stateGotDTO;
    }

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
