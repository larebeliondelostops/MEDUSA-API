<?php

namespace App\Services\Viper;

use App\DTOs\Viper\ScopeDTO;
use App\Interfaces\Viper\ScopeInterface;
use App\Models\Viper\Scope;

class ScopeService implements ScopeInterface
{
    public function createNewScope(ScopeDTO $scopeDTO): void
    {
        $scope = new Scope();
        $scope->fill($scopeDTO->toArray());
        $scope->save();
    }

    public function updateScope(ScopeDTO $scopeDTO, int $id): void
    {
        $scope = Scope::findOrFail($id);
        $data = $scopeDTO->toArray();
        $scope->fill($data);
        $scope->save();
    }

    public function getScopeByProject(string $projectBpin): ScopeDTO
    {
        $scope = Scope::where('project_id', $projectBpin)->first();

        return new ScopeDTO($scope->toArray());
    }

    public function getScope(string $id): ScopeDTO
    {
        $scope = Scope::find($id);

        return new ScopeDTO($scope->toArray());
    }

    public function deleteScope(int $id): ScopeDTO
    {
        $scope = Scope::findOrFail($id);
        $scopeDTO = new ScopeDTO($scope->toArray());
        $scope->delete();

        return $scopeDTO;
    }
}
