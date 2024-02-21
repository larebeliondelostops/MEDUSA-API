<?php

namespace App\Services\Viper;
use App\DTOs\Viper\Department\DepartmentDetailDTO;
use App\DTOs\Viper\Department\DepartmentRequestDTO;
use App\DTOs\Viper\Location\LocationRequestDTO;
use App\DTOs\Viper\Municipality\MunicipalityRequestDTO;
use App\Interfaces\Viper\CoordinatesInterface;
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
 * @version    v1.0.3
 */
class DepartmentService implements DepartmentInterface
{
    private CoordinatesInterface $coordinatesInterface;

    public function __construct(CoordinatesInterface $coordinatesInterface)
    {
        $this->coordinatesInterface = $coordinatesInterface;
    }

    /**
     * Crea un nuevo departamento y lo guarda en la base de datos.
     *
     * @param DepartmentRequestDTO $departmentDTO DTO con la información del departamento a crear.
     * @return DepartmentRequestDTO DTO del departamento recién creado.
     */
    public function createNewDepartment(DepartmentRequestDTO $departmentRequestDTO) : DepartmentRequestDTO
    {
        $departmentRequestDTO->coordinate = $this->coordinatesInterface
                                            ->createNewCoordinates($departmentRequestDTO->coordinate);
        $newDepartment = new Department(
            $departmentRequestDTO->toArray() +
            ['coordinate_id' => $departmentRequestDTO->coordinate->id]
        );
        $newDepartment->save();
        $newDepartment->load('coordinate');
        return new DepartmentRequestDTO(
            $newDepartment->toArray()
        );
    }

    /**
     * Obtiene todos los departamentos disponibles.
     *
     * @return array Array de DepartmentDTO de todos los departamentos.
     */
    public function getAllDepartments() : array
    {
        $departmentsGot = Department::with('coordinate')->get();
        $departmentsDTO = $departmentsGot->transform(
            fn (Department $department) => new DepartmentRequestDTO($department->toArray())
        );
        return $departmentsDTO->toArray();
    }

    /**
     * Obtiene un listado detallado de todos los departamentos, incluyendo sus municipios.
     *
     * @return array Array de DepartmentDetailDTO con detalles de todos los departamentos.
     */
    public function getAllDepartmentsDetail(): array
    {
        $departmentsGot = Department::with('municipalities', 'municipalities.coordinate', 'coordinate')->get();

        $departmentsDetailDTO = $departmentsGot->map(
            function (Department $department)
            {
                $data = $department->toArray();
                $data['municipalities'] = $department->municipalities->map(
                    function (Municipality $municipality)
                    {
                        $data = $municipality->toArray();
                        return new MunicipalityRequestDTO($data);
                    }
                )->toArray();
            return new DepartmentDetailDTO($data);
            }
        );

        return $departmentsDetailDTO->toArray();
    }

    /**
     * Recupera un departamento por su ID y retorna sus detalles.
     *
     * @param int $id ID del departamento a recuperar.
     * @return DepartmentRequestDTO DTO del departamento solicitado.
     */
    public function getDepartmentById(int $id) : DepartmentRequestDTO
    {
        $department = Department::with('coordinate')->findOrFail($id);
        $departmentDTO = new DepartmentRequestDTO(
            $department->toArray()
        );
        return $departmentDTO;
    }

    /**
     * Actualiza un departamento existente identificado por su ID.
     *
     * @param DepartmentRequestDTO $departmentDTO DTO con la nueva información del departamento.
     * @param int $id ID del departamento a actualizar.
     * @return DepartmentRequestDTO DTO del departamento actualizado.
     */
    public function updateDepartment(DepartmentRequestDTO $departmentDTO, int $id) : DepartmentRequestDTO
    {
        $department = Department::with('coordinate')->findOrFail($id);
        $departmentDTO->coordinate = $this->coordinatesInterface->updateCoordinatesById(
            $departmentDTO->coordinate,
            $department->coordinate->id
        );
        $department->fill($departmentDTO->toArray());
        $department->save();
        unset($department['coordinate']); // eliminamos los datos desactualizados
        $departmentDTO->fill($department->toArray());
        return $departmentDTO;
    }

    /**
     * Elimina un departamento identificado por su ID y retorna los detalles del departamento eliminado.
     *
     * @param int $id ID del departamento a eliminar.
     * @return DepartmentRequestDTO DTO del departamento eliminado.
     */
    public function deleteDepartment(int $id) : DepartmentRequestDTO
    {
        $department = Department::with('coordinate')->findOrFail($id);
        $data = $department->toArray();
        $departmentDeletedDTO = new DepartmentRequestDTO(
            $data
        );
        $department->delete();
        return $departmentDeletedDTO;
    }
}
