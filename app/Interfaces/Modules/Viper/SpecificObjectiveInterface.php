<?php

namespace App\Interfaces\Modules\Viper;

use Illuminate\Support\Collection;

/**
 * Interfaz para el servicio de manejo de objetivos específicos de alcances en el sistema.
 *
 * Define operaciones necesarias para la gestión de objetivos específicos de alcances, como creación, actualización, recuperación y eliminación.
 *
 * @package App\Interfaces\Viper
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright 2024 Ignicion S.A.S.
 * @version v1.0.0
 */
interface SpecificObjectiveInterface
{
    /**
     * Crea un nuevo objetivo específico.
     *
     * @param Collection $specificObjective Collection que contiene la información del objetivo específico a crear.
     * @return Collection Collection del objetivo especifico creado.
     */
    public function createNewSpecificObjective(Collection $specificObjective): Collection;

    /**
     * Actualiza un objetivo específico existente.
     *
     * @param Collection $specificObjective Collection que contiene la información actualizada del objetivo específico.
     * @param int $id Identificador único del objetivo específico a actualizar.
     * @return Collection Collection del objetivo específico actualizado.
     */
    public function updateSpecificObjective(Collection $specificObjective,int $id): Collection;

    /**
     * Obtiene todos los objetivos específicos asociados a un alcance.
     *
     * @param int $scopeId Identificador único del alcance.
     * @return Collection Collection de Collections asociados al objetivos especificos.
     */
    public function getAllSpecificObjectiveByScope(int $scopeId): Collection;

    /**
     * Obtiene un objetivo específico por su identificador único.
     *
     * @param int $id Identificador único del objetivo específico.
     * @return Collection Collection del objetivo específico encontrado.
     */
    public function getSpecificObjective(int $id): Collection;

    /**
     * Elimina un objetivo específico por su identificador único.
     *
     * @param int $id Identificador único del objetivo específico a eliminar.
     * @return Collection Collection del objetivo específico eliminado.
     */
    public function deleteSpecificObjective(int $id): Collection;

    /**
     * Obtiene todos los objetivos específicos asociados a un proyecto.
     *
     * @param int $projectId Identificador único del alcance.
     * @return Collection Arreglo de objetivos específicos asociados al alcance.
     */
    public function getAllSpecificObjectiveByProject(int $projectId): Collection;
}
