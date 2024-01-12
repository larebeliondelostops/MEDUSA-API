<?php

namespace App\Services\Viper;
use App\DTOs\Viper\State\StateDTO;
use App\Interfaces\Viper\StateInterface;
use App\Models\Viper\State;

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
        return new StateDTO([]);
    }

    public function deleteState(int $id) : StateDTO
    {
        return new StateDTO([]);
    }

    public function getStateById(int $id) : StateDTO
    {
        return new StateDTO([]);
    }
}
