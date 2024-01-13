<?php

namespace App\Interfaces\Viper;
use App\DTOs\Viper\State\StateDTO;

interface StateInterface
{
    public function createNewState(StateDTO $stateDTO): StateDTO;
    public function getStateById(int $id) : StateDTO;
    public function updateState(int $id, StateDTO $stateDTO) : StateDTO;
    public function deleteState(int $id) : StateDTO;
    public function getAllStates() : array;
}
