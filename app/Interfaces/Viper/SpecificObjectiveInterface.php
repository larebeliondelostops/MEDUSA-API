<?php

namespace App\Interfaces\Viper;

use App\DTOs\Viper\SpecificObjectiveDTO;

/**
 * Interfaz para el servicio de manejo de objetivos específicos de alcances en el sistema.
 *
 * Define operaciones necesarias para la gestión de objetivos específicos de alcances, como
 * creación, actualización, recuperación y eliminación.
 *
 * @package App\Interfaces\Viper
 * @author Tu Nombre <tu@email.com>
 * @version v1.0.0
 */
interface SpecificObjectiveInterface
{
    /**
     * Crea un nuevo objetivo específico.
     *
     * @param SpecificObjectiveDTO $specificObjectiveDTO DTO que contiene la información del objetivo específico a crear.
     * @return void
     */
    public function createNewSpecificObjective(SpecificObjectiveDTO $specificObjectiveDTO): void;

    /**
     * Actualiza un objetivo específico existente.
     *
     * @param SpecificObjectiveDTO $specificObjectiveDTO DTO que contiene la información actualizada del objetivo específico.
     * @return void
     */
    public function updateSpecificObjective(SpecificObjectiveDTO $specificObjectiveDTO,int $id): void;

    /**
     * Obtiene todos los objetivos específicos asociados a un alcance.
     *
     * @param int $scopeId Identificador único del alcance.
     * @return array Arreglo de objetivos específicos asociados al alcance.
     */
    public function getAllSpecificObjectiveByScope(int $id): array;

    /**
     * Obtiene un objetivo específico por su identificador único.
     *
     * @param int $specificObjectiveId Identificador único del objetivo específico.
     * @return SpecificObjectiveDTO DTO del objetivo específico encontrado.
     */
    public function getSpecificObjective(int $id): SpecificObjectiveDTO;

    /**
     * Elimina un objetivo específico por su identificador único.
     *
     * @param int $id Identificador único del objetivo específico a eliminar.
     * @return SpecificObjectiveDTO DTO del objetivo específico eliminado.
     */
    public function deleteSpecificObjective(int $id): SpecificObjectiveDTO;
}
