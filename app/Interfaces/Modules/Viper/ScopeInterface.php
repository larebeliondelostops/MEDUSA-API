<?php

namespace App\Interfaces\Modules\Viper;

use Illuminate\Support\Collection;

/**
 * Interfaz para el servicio de manejo de alcances en el sistema.
 *
 * Define operaciones necesarias para la gestión de alcances, como
 * creación, actualización, recuperación y eliminación.
 *
 * @package App\Interfaces\Viper
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright 2024 Ignicion S.A.S.
 * @version v1.0.0
 */
interface ScopeInterface
{
    /**
     * Crea un nuevo alcance.
     *
     * @param Collection $scope Collection que contiene la información del alcance a crear.
     * @return Collection Collection del alcance creado
     */
    public function createNewScope(Collection $scope): Collection;

    /**
     * Actualiza un alcance existente.
     *
     * @param Collection $scope Collection que contiene la información actualizada del alcance.
     * @param int $id Identificador del alcance a actualizar.
     * @return Collection Collection del alcance actualizado.
     */
    public function updateScope(Collection $scope,int $id): Collection;

    /**
     * Obtiene el alcance asociados a un proyecto.
     *
     * @param string $projectBpin Identificador único del proyecto.
     * @return Collection Collection del alcance asociado al proyecto.
     */
    public function getScopeByProject(string $projectBpin): Collection;

    /**
     * Obtiene un alcance por su identificador único.
     *
     * @param int $id Identificador único del alcance.
     * @return Collection Collection del alcance encontrado.
     */
    public function getScope(int $id): Collection;

    /**
     * Elimina un alcance por su identificador único.
     *
     * @param int $id Identificador único del alcance a eliminar.
     * @return Collection Collection del alcance eliminado.
     */
    public function deleteScope(int $id): Collection;
}
