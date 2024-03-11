<?php

namespace App\Interfaces\Modules\Viper;
use Illuminate\Support\Collection;

/**
 * Interfaz para la gestión de departamentos en el módulo VIPER.
 *
 * Define los métodos necesarios para la creación, recuperación, actualización y eliminación de departamentos.
 * Estos métodos serán implementados por la clase que gestione la lógica de negocio relacionada con los departamentos.
 *
 * @package    App\Interfaces\Modules\Viper
 * @copyright  2024 Ignicion S.A.S.
 * @author     Jorge Abella <j0rg3.4b3ll4@gmail.com>
 * @version    v2.0.0
 */
interface DepartmentInterface
{
    /**
     * Crea un nuevo departamento.
     *
     * @param Collection $departmentData Data con la información del departamento a crear.
     * @return Collection Data del departamento recién creado.
     */
    public function createNewDepartment(Collection $departmentData): Collection;

     /**
     * Obtiene todos los departamentos disponibles.
     *
     * @return Collection Arreglo de DepartmentRequestData de todos los departamentos.
     */
    public function getAllDepartments(): Collection;

    /**
     * Obtiene un listado detallado de todos los departamentos.
     *
     * @return array Arreglo de DepartmentRequestData con detalles de todos los departamentos.
     */
    public function getAllDepartmentsDetail() : Collection;

    /**
     * Obtiene un departamento por su ID.
     *
     * @param int $id Identificador del departamento.
     * @return Collection Data del departamento solicitado.
     */
    public function getDepartmentById(int $id) : Collection;

    /**
     * Actualiza un departamento existente.
     *
     * @param Collection $departmentRequestData Data con la nueva información del departamento.
     * @param int $id ID del departamento a actualizar.
     * @return Collection Data del departamento actualizado.
     */
    public function updateDepartment(Collection $departmentData, int $id) : Collection;

    /**
     * Elimina un departamento.
     *
     * @param int $id ID del departamento a eliminar.
     * @return Collection Data del departamento eliminado.
     */
    public function deleteDepartment(int $id) : Collection;
}
