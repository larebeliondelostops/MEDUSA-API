<?php

namespace App\Interfaces\Viper;

use App\DTOs\Viper\Project\ProjectDetailDTO;
use App\DTOs\Viper\Project\ProjectRequestDTO;

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
    public function createNewProject(ProjectRequestDTO $projectDTO) : ProjectRequestDTO;

    /**
     * Actualiza un proyecto existente.
     *
     * @param ProjectRequestDTO $projectDTO DTO que contiene la información actualizada del proyecto.
     * @param string $bpin Identificador único del proyecto a actualizar.
     * @return ProjectRequestDTO DTO que contiene la información almacenada despues de la actualización
     */
    public function updateProject(ProjectRequestDTO $projectDTO, string $bpin) : ProjectRequestDTO;

    /**
     * Obtiene una lista de proyectos paginada.
     *
     * @param int $perPage Número de proyectos por página.
     * @param int $page Página actual para la paginación.
     * @return array Array de proyectos paginados y datos de paginación.
     */
    public function getAllProjectsPaginated(int $perPage, int $page, array $queryParams = []) : array;

    /**
     * Recupera un proyecto específico por su identificador 'bpin'.
     *
     * @param string $bpin Identificador único del proyecto.
     * @return ProjectDetailDTO DTO con la data del proyecto encontrado.
     */
    public function getProjectByBPIN(string $bpin) : ProjectDetailDTO;

     /**
     * Elimina un proyecto y devuelve sus datos.
     *
     * @param string $bpin Identificador único del proyecto a eliminar.
     * @return ProjectDetailDTO DTO del proyecto eliminado.
     */
    public function deleteProject(string $bpin) : ProjectDetailDTO;
}
