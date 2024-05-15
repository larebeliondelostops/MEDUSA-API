<?php

namespace App\Services\Modules\Viper;
use App\Interfaces\Modules\Viper\CoordinatesInterface;
use App\Interfaces\Modules\Viper\DepartmentInterface;
use App\Models\Modules\Viper\Department;
use App\Models\Viper\Municipality;
use App\Utils\Filters\Modules\Viper\DepartmentFilter;
use Illuminate\Support\Collection;

/**
 * Servicio para la gestión de departamentos en el módulo VIPER.
 *
 * Este servicio implementa la interfaz DepartmentInterface, proporcionando la lógica de negocio
 * para la gestión de departamentos. Incluye operaciones para la creación, actualización, eliminación,
 * y recuperación de departamentos y sus detalles.
 *
 * @package    App\Services\Modules\Viper
 * @copyright  2024 Ignicion S.A.S.
 * @author     Jorge Abella <j0rg3.4b3ll4@gmail.com>
 * @version    v2.0.0
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
     * @param Collection $departmentData Data con la información del departamento a crear.
     * @return Collection Data del departamento recién creado.
     */
    public function createNewDepartment(Collection $departmentRequestData) : Collection
    {
        $departmentRequestData['coordinate'] = $this->coordinatesInterface
                                            ->createNewCoordinates(collect($departmentRequestData['coordinate']));
        $newDepartment = new Department(
            $departmentRequestData->toArray() +
            ['coordinate_id' => $departmentRequestData['coordinate']['id']]
        );
        $newDepartment->save();
        $newDepartment->load('coordinate');
        return collect($newDepartment);
    }

    /**
     * Obtiene todos los departamentos disponibles.
     *
     * @return array Array de DepartmentData de todos los departamentos.
     */
    public function getAllDepartments(array $queryParam = []) : Collection
    {
        // Instancia del filtro para transformar los parámetros de consulta
        $filter = new DepartmentFilter();
        $queryItems = $filter->transform($queryParam);

        // Construir la consulta de departments
        $departmentQuery = Department::with('coordinate');
        foreach($queryItems as $item)
        {
            $departmentQuery->orWhere(...$item);
        }

        return collect($departmentQuery->get());
    }

    /**
     * Obtiene un listado detallado de todos los departamentos, incluyendo sus municipios.
     *
     * @return array Array de DepartmentDetailData con detalles de todos los departamentos.
     */
    public function getAllDepartmentsDetail(): Collection
    {
        $departmentsGot = Department::with('municipalities', 'municipalities.coordinate', 'coordinate')->get();
        return collect($departmentsGot);
    }

    /**
     * Recupera un departamento por su ID y retorna sus detalles.
     *
     * @param int $id ID del departamento a recuperar.
     * @return Collection Data del departamento solicitado.
     */
    public function getDepartmentById(int $id) : Collection
    {
        $department = Department::with('coordinate')->findOrFail($id);
        return collect($department);
    }

    /**
     * Actualiza un departamento existente identificado por su ID.
     *
     * @param Collection $departmentData Data con la nueva información del departamento.
     * @param int $id ID del departamento a actualizar.
     * @return Collection Data del departamento actualizado.
     */
    public function updateDepartment(Collection $departmentData, int $id) : Collection
    {
        $department = Department::with('coordinate')->findOrFail($id);
        $departmentData['coordinate'] = $this->coordinatesInterface->updateCoordinatesById(
            collect($departmentData['coordinate']),
            $department->coordinate->id
        );
        $department->fill($departmentData->toArray());
        $department->save();
        unset($department['coordinate']); // eliminamos los datos desactualizados
        return collect($department);
    }

    /**
     * Elimina un departamento identificado por su ID y retorna los detalles del departamento eliminado.
     *
     * @param int $id ID del departamento a eliminar.
     * @return Collection Data del departamento eliminado.
     */
    public function deleteDepartment(int $id) : Collection
    {
        $department = Department::with('coordinate')->findOrFail($id);
        $department->delete();
        return collect($department);
    }
}
