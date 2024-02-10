<?php

namespace App\DTOs\Viper\Location;

use App\DTOs\Viper\Coordinates\CoordinatesRequestDTO;
use App\DTOs\Viper\Department\DepartmentRequestDTO;
use App\DTOs\Viper\DTO;
use App\DTOs\Viper\Municipality\MunicipalityRequestDTO;
use App\DTOs\Viper\Project\ProjectSummaryDTO;

/**
 * Clase base DTO (Data Transfer Object).
 *
 * Data Transfer Object para locaciones.
 *
 * Esta clase representa la estructura de datos de un proyecto para la locación y se utiliza para transferir
 * información detallada de las locaciones entre diferentes capas de la aplicación.
 * @package    App\DTOs\Viper\Location
 * @author     Jorge Abella <j0rg3.4b3ll4@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class LocationDetailDTO extends DTO
{
    public int $id; // id con la que fue almacenada la locacion
    public string $name; // nombre de la locación
    public ProjectSummaryDTO $project; // bpin del proyecto al que pertenece la locación
    public CoordinatesRequestDTO $coordinate; // coordenadas de la locación
    public DepartmentRequestDTO $department; // departamento de la locación
    public MunicipalityRequestDTO $municipality; // municipio de la locación
}
