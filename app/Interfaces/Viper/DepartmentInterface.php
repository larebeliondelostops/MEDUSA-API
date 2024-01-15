<?php

namespace App\Interfaces\Viper;
use App\DTOs\Viper\Department\DepartmentDTO;

interface DepartmentInterface
{
    public function createNewDepartment(DepartmentDTO $departmentDTO): DepartmentDTO;
    public function getAllDepartments(): array;
    public function getAllDepartmentsDetail() : array;
    public function getDepartmentById(int $id) : DepartmentDTO;
    public function updateDepartment(DepartmentDTO $departmentDTO, int $id) : DepartmentDTO;
    public function deleteDepartment(int $id) : DepartmentDTO;
}
