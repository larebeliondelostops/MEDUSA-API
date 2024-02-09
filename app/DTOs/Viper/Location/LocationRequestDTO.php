<?php

namespace App\DTOs\Viper\Location;

use App\DTOs\Viper\Coordinates\CoordinatesRequestDTO;
use App\DTOs\Viper\DTO;

/**
 * Clase base DTO (Data Transfer Object).
 *
 * Data Transfer Object para locaciones.
 *
 * Esta clase representa la estructura de datos de un proyecto para la locación y se utiliza para transferir
 * información de proyectos entre diferentes capas de la aplicación.
 * @package    App\DTOs\Viper\Location
 * @author     Jorge Abella <j0rg3.4b3ll4@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class LocationRequestDTO extends DTO
{
    public ?int $id = null; // id de la locacion
    public string $name; // nombre de la locación
    public string $project_bpin; // bpin del proyecto al que pertenece la locaci
    public CoordinatesRequestDTO $coordinate; // coordenadas de la lacacion
    public int $department_id; // llave foránea del departamento al que pertenece
    public int $municipality_id; // llave foránea al municipio al que pertenece
}
