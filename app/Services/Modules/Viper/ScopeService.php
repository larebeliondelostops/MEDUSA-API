<?php

namespace App\Services\Modules\Viper;

use App\DTOs\Viper\Scope\ScopeDTO;
use App\Interfaces\Modules\Viper\ScopeInterface;
use App\Models\Modules\Viper\Scope;

/**
 * Servicio para la gestión de alcances (scopes) en la aplicación Viper.
 *
 * @package App\Services\Modules\Viper
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright 2024 Ignicion S.A.S.
 * @version v1.0.0
 */
class ScopeService implements ScopeInterface
{
    /**
     * Crea un nuevo alcance (scope) en la base de datos.
     *
     * @param ScopeDTO $scopeDTO Datos del alcance a ser creado.
     * @return ScopeDTO
     */
    public function createNewScope(ScopeDTO $scopeDTO): ScopeDTO
    {
        $scope = new Scope();
        $scope->fill($scopeDTO->toArray());
        $scope->save();
        return New ScopeDTO($scope->toArray());
    }

    /**
     * Actualiza un alcance existente en la base de datos.
     *
     * @param ScopeDTO $scopeDTO Datos actualizados del alcance.
     * @param int $id Identificador único del alcance a ser actualizado.
     * @return ScopeDTO
     */
    public function updateScope(ScopeDTO $scopeDTO, int $id): ScopeDTO
    {
        $scope = Scope::findOrFail($id);
        $data = $scopeDTO->toArray();
        $scope->fill($data);
        $scope->save();
        return New ScopeDTO($scope->toArray());
    }

    /**
     * Obtiene un alcance por proyecto.
     *
     * @param string $projectBpin Identificador del proyecto asociado al alcance.
     * @return ScopeDTO
     */
    public function getScopeByProject(string $projectBpin): ScopeDTO
    {
        $scope = Scope::where('project_id', $projectBpin)->firstOrFail();

        return new ScopeDTO($scope->toArray());
    }

    /**
     * Obtiene un alcance por su identificador único.
     *
     * @param string $id Identificador único del alcance.
     * @return ScopeDTO
     */
    public function getScope(string $id): ScopeDTO
    {
        $scope = Scope::findOrFail($id);

        return new ScopeDTO($scope->toArray());
    }

    /**
     * Elimina un alcance existente en la base de datos.
     *
     * @param int $id Identificador único del alcance a ser eliminado.
     * @return ScopeDTO Datos del alcance eliminado.
     */
    public function deleteScope(int $id): ScopeDTO
    {
        $scope = Scope::findOrFail($id);
        $scopeDTO = new ScopeDTO($scope->toArray());
        $scope->delete();

        return $scopeDTO;
    }
}
