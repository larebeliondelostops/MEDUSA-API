<?php

namespace App\DTOs\Viper\Project;

use App\DTOs\Viper\DTO;

/**
 * Clase base DTO (Data Transfer Object).
 *
 * Data Transfer Object para proyectos.
 *
 * Esta clase representa la estructura de datos de un proyecto para el Menu y se utiliza para transferir
 * información de proyectos entre diferentes capas de la aplicación.
 * @package    App\DTOs\Viper\Project
 * @author     Jorge Abella <j0rg3.4b3ll4@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */

class ProjectSummaryDTO extends DTO
{
    public string $bpin;  // Identificador unico del proyecto
    public string $name;  // Nombre del proyecto
    public string $state; // Estado del proyecto
}
