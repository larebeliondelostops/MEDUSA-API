<?php

namespace App\Services\Viper;
use App\DTOs\Viper\Department\DepartmentDetailDTO;
use App\DTOs\Viper\Department\DepartmentDTO;
use App\DTOs\Viper\Municipality\MunicipalityDTO;
use App\Interfaces\Viper\DepartmentInterface;
use App\Models\Viper\Department;
use App\Models\Viper\Municipality;

/**
 * Servicio para la gestión de departamentos en el módulo VIPER.
 *
 * Este servicio implementa la interfaz DepartmentInterface, proporcionando la lógica de negocio
 * para la gestión de departamentos. Incluye operaciones para la creación, actualización, eliminación,
 * y recuperación de departamentos y sus detalles.
 *
 * @package    App\Services\Viper
 * @copyright  2024 Ignicion S.A.S.
 * @author     Jorge Abella <j0rg3.4b3ll4@gmail.com>
 * @version    v1.0.2
 */
class DepartmentService implements DepartmentInterface
{
    /**
     * Crea un nuevo departamento y lo guarda en la base de datos.
     *
     * @param DepartmentDTO $departmentDTO DTO con la información del departamento a crear.
     * @return DepartmentDTO DTO del departamento recién creado.
     */
    public function createNewDepartment(DepartmentDTO $departmentDTO) : DepartmentDTO
    {
        $newDepartment = new Department($departmentDTO->toArray());
        $newDepartment->save();
        return new DepartmentDTO($newDepartment->toArray());
    }

    /**
     * Obtiene todos los departamentos disponibles.
     *
     * @return array Array de DepartmentDTO de todos los departamentos.
     */
    public function getAllDepartments() : array
    {
        $departmentsGot = Department::all();
        $departmentsDTO = $departmentsGot->transform(
            function (Department $department)
            {
                return new DepartmentDTO($department->toArray());
            }
        )->toArray();
        return $departmentsDTO;
    }

    /**
     * Obtiene un listado detallado de todos los departamentos, incluyendo sus municipios.
     *
     * @return array Array de DepartmentDetailDTO con detalles de todos los departamentos.
     */
    public function getAllDepartmentsDetail(): array
    {
        $departmentsGot = Department::with('municipalities')->get();

        $departmentsDetailDTO = $departmentsGot->map(function (Department $department) {
            $department->municipalities->transform(
                fn(Municipality $municipality) => new MunicipalityDTO($municipality->toArray()));
            return new DepartmentDetailDTO($department->toArray());
        });

        return $departmentsDetailDTO->toArray();
    }

    /**
     * Recupera un departamento por su ID y retorna sus detalles.
     *
     * @param int $id ID del departamento a recuperar.
     * @return DepartmentDTO DTO del departamento solicitado.
     */
    public function getDepartmentById(int $id) : DepartmentDTO
    {
        $department = Department::findOrFail($id);
        $departmentDTO = new DepartmentDTO($department->toArray());
        return $departmentDTO;
    }

    /**
     * Actualiza un departamento existente identificado por su ID.
     *
     * @param DepartmentDTO $departmentDTO DTO con la nueva información del departamento.
     * @param int $id ID del departamento a actualizar.
     * @return DepartmentDTO DTO del departamento actualizado.
     */
    public function updateDepartment(DepartmentDTO $departmentDTO, int $id) : DepartmentDTO
    {
        $department = Department::findOrFail($id);
        $department->fill($departmentDTO->toArray());
        $department->save();
        return new DepartmentDTO($department->toArray());
    }

    /**
     * Elimina un departamento identificado por su ID y retorna los detalles del departamento eliminado.
     *
     * @param int $id ID del departamento a eliminar.
     * @return DepartmentDTO DTO del departamento eliminado.
     */
    public function deleteDepartment(int $id) : DepartmentDTO
    {
        $department = Department::findOrFail($id);
        $departmentDeletedDTO = new DepartmentDTO($department->toArray());
        $department->delete();
        return $departmentDeletedDTO;
    }
}
