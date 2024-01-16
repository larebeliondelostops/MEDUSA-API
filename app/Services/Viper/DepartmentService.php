<?php

namespace App\Services\Viper;
use App\DTOs\Viper\Department\DepartmentDetailDTO;
use App\DTOs\Viper\Department\DepartmentDTO;
use App\DTOs\Viper\Municipality\MunicipalityDTO;
use App\Interfaces\Viper\DepartmentInterface;
use App\Models\Viper\Department;
use App\Models\Viper\Municipality;

class DepartmentService implements DepartmentInterface
{
    public function createNewDepartment(DepartmentDTO $departmentDTO) : DepartmentDTO
    {
        $newDepartment = new Department($departmentDTO->toArray());
        $newDepartment->save();
        return new DepartmentDTO($newDepartment->toArray());
    }

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

    public function getDepartmentById(int $id) : DepartmentDTO
    {
        $department = Department::findOrFail($id);
        $departmentDTO = new DepartmentDTO($department->toArray());
        return $departmentDTO;
    }

    public function updateDepartment(DepartmentDTO $departmentDTO, int $id) : DepartmentDTO
    {
        $department = Department::findOrFail($id);
        $department->fill($departmentDTO->toArray());
        $department->save();
        return new DepartmentDTO($department->toArray());
    }

    public function deleteDepartment(int $id) : DepartmentDTO
    {
        $department = Department::findOrFail($id);
        $departmentDeletedDTO = new DepartmentDTO($department->toArray());
        $department->delete();
        return $departmentDeletedDTO;
    }
}
