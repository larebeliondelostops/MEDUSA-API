<?php

namespace App\Interfaces\Viper;

use App\DTOs\Viper\Project\ProjectDTO;
use Illuminate\Http\Request;

/**
 * Interfaz para el servicio de manejo de proyectos.
 *
 * Define las operaciones necesarias para la gestión de proyectos en el sistema.
 * Las operaciones incluyen la creación, actualización, recuperación y eliminación de proyectos.
 *
 * @package    App\Interfaces\Viper
 * @author     Jorge Abella <j0rg3.4b3ll4@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
interface ProjectInterface {
     /**
     * Crea un nuevo proyecto.
     *
     * @param ProjectDTO $projectDTO DTO que contiene la información del proyecto a crear.
     * @return void
     */
    public function createNewProject(ProjectDTO $projectDTO) : void;

    /**
     * Actualiza un proyecto existente.
     *
     * @param ProjectDTO $projectDTO DTO que contiene la información actualizada del proyecto.
     * @param string $bpin Identificador único del proyecto a actualizar.
     * @return void
     */
    public function updateProject(ProjectDTO $projectDTO, string $bpin):void;

    /**
     * Obtiene una lista de proyectos paginada.
     *
     * @param int $perPage Número de proyectos por página.
     * @param int $page Página actual para la paginación.
     * @param string|null $name Filtro opcional por nombre del proyecto.
     * @return array Array de proyectos paginados y datos de paginación.
     */
    public function getAllProjectsPaginated(int $perPage, int $page, Request $request) : array;

    /**
     * Recupera un proyecto específico por su identificador 'bpin'.
     *
     * @param string $bpin Identificador único del proyecto.
     * @return ProjectDTO DTO del proyecto encontrado.
     */
    public function getProjectByBPIN(string $bpin) : ProjectDTO;

     /**
     * Elimina un proyecto y devuelve sus datos.
     *
     * @param string $bpin Identificador único del proyecto a eliminar.
     * @return ProjectDTO DTO del proyecto eliminado.
     */
    public function deleteProject(string $bpin) : ProjectDTO;
}
