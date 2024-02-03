<?php

namespace App\DTOs\Viper\Project;

use App\DTOs\Viper\Coordinates\CoordinatesRequestDTO;
use App\DTOs\Viper\Department\DepartmentRequestDTO;
use App\DTOs\Viper\DTO;
use App\DTOs\Viper\Municipality\MunicipalityDTO;
use App\DTOs\Viper\Municipality\MunicipalityRequestDTO;
use App\DTOs\Viper\State\StateDTO;
use App\DTOs\Viper\Substate\SubstateDTO;

/**
 * Clase base DTO (Data Transfer Object).
 *
 * Data Transfer Object para proyectos.
 *
 * Esta clase representa la estructura de datos de un proyecto y se utiliza para transferir
 * información de proyectos a los usuarios. Almacena la información de las tablas con relaciones
 * a proyectos.
 *
 * @package    App\DTOs\Viper\Project
 * @author     Jorge Abella <j0rg3.4b3ll4@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */

class ProjectDetailDTO extends DTO
{
    public string $bpin;                     // Identificador único del proyecto
    public string $name;                     // Nombre del proyecto
    public string $ocad;                     // Código OCAD
    public StateDTO $state;                    // Estado del proyecto
    public ?SubstateDTO $substate=null;                 // Subestado del proyecto
    public float $total_value;               // Valor total del proyecto
    public float $requested_value;           // Valor solicitado del proyecto
    public float $executed_value = 0.0;      // Valor ejecutado del proyecto
    public float $physical_progress = 0.0;   // Avance físico del proyecto
    public float $financial_progress = 0.0;  // Avance financiero del proyecto
    public string $responsible_entity;       // Entidad responsable del proyecto
    public string $sector;                   // Sector del proyecto
    public CoordinatesRequestDTO $location;     // ubicacion del proyecto
    public DepartmentRequestDTO $department;     // Id del departamento al que pertenece el proyecto
    public ?MunicipalityRequestDTO $municipality=null; // Id del municipio donde pertenece el departamento
    public int $beneficiaries;               // Número de beneficiarios del proyecto
    public string $planner;                  // Planificador del proyecto
    public string $execution_approval_date;  // Fecha de aprobación de ejecución
    public ?string $completion_date;         // Fecha de finalización (puede ser nulo)
    public ?string $start_date_execution_phase; // Fecha de inicio de la fase de ejecución (puede ser nulo)
    public ?string $unilateral_termination;  // Fecha de finalizacion unilateral
    public ?string $bilateral_termination;   // Fecha de finalizacion bilateral
    public int $project_duration_in_months;  // Duración del proyecto en meses
    public int $reporting_frequency;         // Frecuencia de reportes
    public string $general_objective;        // Objetivo general del proyecto
}
