<?php

namespace App\Services\Viper;
use App\DTOs\Viper\Department\DepartmentDetailDTO;
use App\DTOs\Viper\Department\DepartmentRequestDTO;
use App\DTOs\Viper\Location\LocationRequestDTO;
use App\DTOs\Viper\Municipality\MunicipalityDTO;
use App\Interfaces\Viper\DepartmentInterface;
use App\Interfaces\Viper\LocationInterface;
use App\Models\Viper\Department;
use App\Models\Viper\Location;
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
    private LocationInterface $locationInterface;

    public function __construct(LocationInterface $locationInterface)
    {
        $this->locationInterface = $locationInterface;
    }

    /**
     * Crea un nuevo departamento y lo guarda en la base de datos.
     *
     * @param DepartmentRequestDTO $departmentDTO DTO con la información del departamento a crear.
     * @return DepartmentRequestDTO DTO del departamento recién creado.
     */
    public function createNewDepartment(DepartmentRequestDTO $departmentDTO) : DepartmentRequestDTO
    {
        $locationSaved = $this->locationInterface->createNewLocation($departmentDTO->location);
        $newDepartment = new Department(
            $departmentDTO->toArray() +
            ['location_id' => $locationSaved->id]
        );
        $newDepartment->save();
        return new DepartmentRequestDTO(
            $newDepartment->toArray() +
            ['location' => $locationSaved]);
    }

    /**
     * Obtiene todos los departamentos disponibles.
     *
     * @return array Array de DepartmentDTO de todos los departamentos.
     */
    public function getAllDepartments() : array
    {
        $departmentsGot = Department::with('location')->get();
        $departmentsDTO = $departmentsGot->transform(
            function (Department $department)
            {
                $data = $department->toArray();
                $data["location"] = new LocationRequestDTO($data["location"]);
                return new DepartmentRequestDTO(
                    $data
                );
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
        $departmentsGot = Department::with('municipalities', 'location')->get();

        $departmentsDetailDTO = $departmentsGot->map(
            function (Department $department)
            {
                $data = $department->toArray();
                $data['municipalities'] = $department->municipalities->map(
                    fn(Municipality $municipality) => new MunicipalityDTO($municipality->toArray())
                )->toArray();
                $data['location'] = new LocationRequestDTO($data['location']);
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
        $department = Department::with('location')->findOrFail($id);
        $data = $department->toArray();
        $data['location'] = new LocationRequestDTO($data['location']);
        $departmentDTO = new DepartmentRequestDTO(
            $data
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
        $department = Department::with('location')->findOrFail($id);
        $department->fill($departmentDTO->toArray());
        $department->save();
        $data = $department->toArray();
        $data['location'] = $this->locationInterface->updateLocationById(
            $departmentDTO->location,
            $data['location']['id']
        );
        return new DepartmentRequestDTO(
            $data
        );
    }

    /**
     * Elimina un departamento identificado por su ID y retorna los detalles del departamento eliminado.
     *
     * @param int $id ID del departamento a eliminar.
     * @return DepartmentRequestDTO DTO del departamento eliminado.
     */
    public function deleteDepartment(int $id) : DepartmentRequestDTO
    {
        $department = Department::with('location')->findOrFail($id);
        $data = $department->toArray();
        $data['location'] = $this->locationInterface->deleteLocation($data['location']['id']);
        $departmentDeletedDTO = new DepartmentRequestDTO(
            $data
        );
        $department->delete();
        return $departmentDeletedDTO;
    }
}
