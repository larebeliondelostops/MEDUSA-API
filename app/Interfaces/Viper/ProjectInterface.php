<?php 

namespace App\Interfaces\Viper;

use App\DTOs\Viper\ProjectDTO;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ProjectInterface {
    public function createNewProject(ProjectDTO $projectDTO) : void;
    public function updateProject(ProjectDTO $projectDTO, string $bpin):void;
    public function getAllProjectsPaginated(int $perPage, ?string $name) : LengthAwarePaginator;
    public function getProjectByBPIN(string $bpin) : ProjectDTO;
}
