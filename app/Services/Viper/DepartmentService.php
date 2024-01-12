<?php

namespace App\Services\Viper;
use App\DTOs\Viper\Department\DepartmentDTO;
use App\Interfaces\Viper\DepartmentInterface;
use App\Models\Viper\Department;

class DepartmentService implements DepartmentInterface
{
    public function getDepartmentById(int $id) : DepartmentDTO
    {
        $department = Department::find($id);
        $departmentDTO = new DepartmentDTO($department->toArray());
        return $departmentDTO;
    }
}
