<?php

namespace App\Interfaces\Viper;
use App\DTOs\Viper\Department\DepartmentDTO;

/**
 * Interfaz para la gestión de departamentos en el módulo VIPER.
 *
 * Define los métodos necesarios para la creación, recuperación, actualización y eliminación de departamentos.
 * Estos métodos serán implementados por la clase que gestione la lógica de negocio relacionada con los departamentos.
 *
 * @package    App\Interfaces\Viper
 * @copyright  2024 Ignicion S.A.S.
 * @author     Jorge Abella <j0rg3.4b3ll4@gmail.com>
 * @version    v1.0.2
 */
interface DepartmentInterface
{
    /**
     * Crea un nuevo departamento.
     *
     * @param DepartmentDTO $departmentDTO DTO con la información del departamento a crear.
     * @return DepartmentDTO DTO del departamento recién creado.
     */
    public function createNewDepartment(DepartmentDTO $departmentDTO): DepartmentDTO;

     /**
     * Obtiene todos los departamentos disponibles.
     *
     * @return array Arreglo de DepartmentDTO de todos los departamentos.
     */
    public function getAllDepartments(): array;

    /**
     * Obtiene un listado detallado de todos los departamentos.
     *
     * @return array Arreglo de DepartmentDTO con detalles de todos los departamentos.
     */
    public function getAllDepartmentsDetail() : array;

    /**
     * Obtiene un departamento por su ID.
     *
     * @param int $id Identificador del departamento.
     * @return DepartmentDTO DTO del departamento solicitado.
     */
    public function getDepartmentById(int $id) : DepartmentDTO;

    /**
     * Actualiza un departamento existente.
     *
     * @param DepartmentDTO $departmentDTO DTO con la nueva información del departamento.
     * @param int $id ID del departamento a actualizar.
     * @return DepartmentDTO DTO del departamento actualizado.
     */
    public function updateDepartment(DepartmentDTO $departmentDTO, int $id) : DepartmentDTO;

    /**
     * Elimina un departamento.
     *
     * @param int $id ID del departamento a eliminar.
     * @return DepartmentDTO DTO del departamento eliminado.
     */
    public function deleteDepartment(int $id) : DepartmentDTO;
}
