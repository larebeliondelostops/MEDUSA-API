<?php 

namespace App\Interfaces\Viper;

use App\DTOs\Viper\ProjectDTO;

interface ProjectInterface {
    public function createNewProject(ProjectDTO $projectDTO);
}