<?php

namespace App\Services\Modules\Viper;

use Illuminate\Support\Collection;
use App\Interfaces\Modules\Viper\ScopeInterface;
use App\Models\Modules\Viper\Scope;

/**
 * Servicio para la gestión de alcances (scopes) en la aplicación Viper.
 *
 * Este servicio implementa la interfaz ScopeInterface, proporcionando la lógica de negocio para la gestión del alcance. Incluye operaciones para la creación, actualización, eliminación, y recuperación de estados y sus detalles.
 * 
 * @package App\Services\Modules\Viper
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright 2024 Ignicion S.A.S.
 * @version v2.0.0
 */
class ScopeService implements ScopeInterface
{
    /**
     * Crea un nuevo alcance (scope) en la base de datos.
     *
     * @param Collection $scope Datos del alcance a ser creado.
     * @return Collection Datos del alcance recién creado.
     */
    public function createNewScope(Collection $scope): Collection
    {
        $newScope = new Scope($scope->toArray());
        $newScope->save();
        return collect($newScope);
    }

    /**
     * Actualiza un alcance existente en la base de datos.
     *
     * @param Collection $scope Datos actualizados del alcance.
     * @param int $id Identificador único del alcance a ser actualizado.
     * @return Collection Datos del estado actualizado.
     */
    public function updateScope(Collection $scope, int $id): Collection
    {
        $scopeUpdate = Scope::findOrFail($id);
        $scopeUpdate->fill($scope->toArray());
        $scopeUpdate->save();
        return collect($scopeUpdate);
    }

    /**
     * Obtiene un alcance por proyecto.
     *
     * @param string $projectBpin Identificador del proyecto asociado al alcance.
     * @return Collection Collection de Collections de los alcances solicitados.
     */
    public function getScopeByProject(string $projectBpin): Collection
    {
        $scope = Scope::where('project_id', $projectBpin)->firstOrFail();

        return collect($scope);
    }

    /**
     * Obtiene un alcance por su identificador único.
     *
     * @param string $id Identificador único del alcance.
     * @return Collection Datos del alcance solicitado.
     */
    public function getScope(int $id): Collection
    {
        $scope = Scope::findOrFail($id);
        return collect($scope);
    }

    /**
     * Elimina un alcance existente en la base de datos.
     *
     * @param int $id Identificador único del alcance a ser eliminado.
     * @return Collection Datos del alcance eliminado.
     */
    public function deleteScope(int $id): Collection
    {
        $scope = Scope::findOrFail($id);
        $scope->delete();

        return collect($scope);
    }
}
