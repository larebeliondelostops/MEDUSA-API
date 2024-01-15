<?php

namespace App\Services\Viper;
use App\DTOs\Viper\Department\DepartmentDetailDTO;
use App\DTOs\Viper\Department\DepartmentDTO;
use App\Interfaces\Viper\DepartmentInterface;
use App\Interfaces\Viper\MunicipalityInterface;
use App\Models\Viper\Department;

class DepartmentService implements DepartmentInterface
{
    private MunicipalityInterface $municipalityInterface;

    public function __construct(MunicipalityInterface $municipalityInterface)
    {
        $this->municipalityInterface = $municipalityInterface;
    }

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

    public function getAllDepartmentsDetail() : array
    {
        $departmentsGot = Department::all();
        $departmentsDTO = $departmentsGot->transform(
            function (Department $department)
            {
                $municipalities = ["municipalities" => $this->municipalityInterface->getAllMunicipalities(["department_id" => ["eq"=>$department->id]])];
                return new DepartmentDetailDTO($department->toArray() + $municipalities);
            }
        )->toArray();
        return $departmentsDTO;
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
