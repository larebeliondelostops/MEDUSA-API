<?php

namespace App\Interfaces\Modules\Viper;

use App\DTOs\Viper\Project\ProjectDetailDTO;
use App\DTOs\Viper\Project\ProjectRequestDTO;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

/**
 * Interfaz para el servicio de manejo de proyectos.
 *
 * Define las operaciones necesarias para la gestión de proyectos en el sistema.
 * Las operaciones incluyen la creación, actualización, recuperación y eliminación de proyectos.
 *
 * @package    App\Interfaces\Viper
 * @author     Jorge Abella <j0rg3.4b3ll4@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.2
 */
interface ProjectInterface {
     /**
     * Crea un nuevo proyecto.
     *
     * @param ProjectRequestDTO $projectDTO DTO que contiene la información del proyecto a crear.
     * @return ProjectRequestDTO DTO que contiene la información del proyecto creado.
     */
    public function createNewProject(Collection $projectDTO) : Collection;

    /**
     * Actualiza un proyecto existente.
     *
     * @param ProjectRequestDTO $projectDTO DTO que contiene la información actualizada del proyecto.
     * @param string $bpin Identificador único del proyecto a actualizar.
     * @return ProjectRequestDTO DTO que contiene la información almacenada despues de la actualización
     */
    public function updateProject(Collection $projectDTO, string $bpin) : Collection;

    /**
     * Obtiene una lista de todos los proyectos.
     *
     * @return array Array con todos los proyectos.
     */
    public function getAllProjects() : Collection;


    /**
     * Obtiene una lista de proyectos paginada.
     *
     * @param int $perPage Número de proyectos por página.
     * @param int $page Página actual para la paginación.
     * @return array Array de proyectos paginados y datos de paginación.
     */
    public function getAllProjectsPaginated(int $perPage, int $page, array $queryParams = []) : Collection;

    /**
     * Recupera un proyecto específico por su identificador 'bpin'.
     *
     * @param string $bpin Identificador único del proyecto.
     * @return ProjectDetailDTO DTO con la data del proyecto encontrado.
     */
    public function getProjectByBPIN(string $bpin) : Collection;

     /**
     * Elimina un proyecto y devuelve sus datos.
     *
     * @param string $bpin Identificador único del proyecto a eliminar.
     * @return ProjectDetailDTO DTO del proyecto eliminado.
     */
    public function deleteProject(string $bpin) : Collection;

    /**
     * Crea un nuevo proyecto a partir de un archivo MGA.
     * 
     * @param Uploadedfile $mgaFile
     * @return Collection
    */
    public function createNewProjectFromMGA( UploadedFile $mgaFile) : Collection;
}
