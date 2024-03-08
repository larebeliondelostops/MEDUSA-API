<?php

namespace App\Interfaces\Viper;
use App\DTOs\Viper\Department\DepartmentRequestDTO;

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
     * @param DepartmentRequestDTO $departmentDTO DTO con la información del departamento a crear.
     * @return DepartmentRequestDTO DTO del departamento recién creado.
     */
    public function createNewDepartment(DepartmentRequestDTO $departmentDTO): DepartmentRequestDTO;

     /**
     * Obtiene todos los departamentos disponibles.
     *
     * @return array Arreglo de DepartmentRequestDTO de todos los departamentos.
     */
    public function getAllDepartments(): array;

    /**
     * Obtiene un listado detallado de todos los departamentos.
     *
     * @return array Arreglo de DepartmentRequestDTO con detalles de todos los departamentos.
     */
    public function getAllDepartmentsDetail() : array;

    /**
     * Obtiene un departamento por su ID.
     *
     * @param int $id Identificador del departamento.
     * @return DepartmentRequestDTO DTO del departamento solicitado.
     */
    public function getDepartmentById(int $id) : DepartmentRequestDTO;

    /**
     * Actualiza un departamento existente.
     *
     * @param DepartmentRequestDTO $departmentRequestDTO DTO con la nueva información del departamento.
     * @param int $id ID del departamento a actualizar.
     * @return DepartmentRequestDTO DTO del departamento actualizado.
     */
    public function updateDepartment(DepartmentRequestDTO $departmentDTO, int $id) : DepartmentRequestDTO;

    /**
     * Elimina un departamento.
     *
     * @param int $id ID del departamento a eliminar.
     * @return DepartmentRequestDTO DTO del departamento eliminado.
     */
    public function deleteDepartment(int $id) : DepartmentRequestDTO;
}
