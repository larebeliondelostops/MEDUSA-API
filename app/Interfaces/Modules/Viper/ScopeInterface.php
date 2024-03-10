<?php

namespace App\Interfaces\Modules\Viper;

use App\DTOs\Viper\Scope\ScopeDTO;

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
     * @param ScopeDTO $scopeDTO DTO que contiene la información del alcance a crear.
     * @return void
     */
    public function createNewScope(ScopeDTO $scopeDTO): ScopeDTO;

    /**
     * Actualiza un alcance existente.
     *
     * @param ScopeDTO $scopeDTO DTO que contiene la información actualizada del alcance.
     * @return void
     */
    public function updateScope(ScopeDTO $scopeDTO,int $id): ScopeDTO;

    /**
     * Obtiene el alcance asociados a un proyecto.
     *
     * @param string $projectBpin Identificador único del proyecto.
     * @return array Arreglo del alcance asociado al proyecto.
     */
    public function getScopeByProject(string $projectBpin): ScopeDTO;

    /**
     * Obtiene un alcance por su identificador único.
     *
     * @param string $scopeId Identificador único del alcance.
     * @return ScopeDTO DTO del alcance encontrado.
     */
    public function getScope(string $id): ScopeDTO;

    /**
     * Elimina un alcance por su identificador único.
     *
     * @param int $id Identificador único del alcance a eliminar.
     * @return ScopeDTO DTO del alcance eliminado.
     */
    public function deleteScope(int $id): ScopeDTO;
}
