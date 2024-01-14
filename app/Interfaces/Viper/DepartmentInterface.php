<?php

namespace App\Interfaces\Viper;
use App\DTOs\Viper\Department\DepartmentDTO;

interface DepartmentInterface
{
    public function getDepartmentById(int $id) : DepartmentDTO;
}
