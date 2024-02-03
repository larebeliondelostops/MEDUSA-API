<?php

namespace App\DTOs\Viper\Project;

use App\DTOs\Viper\Coordinates\CoordinatesRequestDTO;
use App\DTOs\Viper\DTO;


/**
 * Clase base DTO (Data Transfer Object).
 *
 * Data Transfer Object para proyectos.
 *
 * Esta clase representa la estructura de datos de un proyecto y se utiliza para recibir la información
 * enviada por el usuario de proyectos. Contiene la información no detallada de las relaciones entre proyectos
 * como llaves foraneas.
 *
 * @package    App\DTOs\Viper\Project
 * @author     Jorge Abella <j0rg3.4b3ll4@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */

class ProjectRequestDTO extends DTO
{
    public string $bpin;                     // Identificador único del proyecto
    public string $name;                     // Nombre del proyecto
    public string $ocad;                     // Código OCAD
    public int $state_id;                    // Id Estado del proyecto
    public ?int $substate_id=null;                 // Id Subestado del proyecto
    public float $total_value;               // Valor total del proyecto
    public float $requested_value;           // Valor solicitado del proyecto
    public float $executed_value = 0.0;      // Valor ejecutado del proyecto
    public float $physical_progress = 0.0;   // Avance físico del proyecto
    public float $financial_progress = 0.0;  // Avance financiero del proyecto
    public string $responsible_entity;       // Entidad responsable del proyecto
    public int $sector_id;                   // Sector del proyecto
    public CoordinatesRequestDTO $coordinates; // Ubicacion del proyecto
    public int $department_id;               // Id del departamento al que pertenece el proyecto
    public ?int $municipality_id=null;             // Id del municipio donde pertenece el departamento
    public int $beneficiaries;               // Número de beneficiarios del proyecto
    public string $planner;                  // Planificador del proyecto
    public string $execution_approval_date;  // Fecha de aprobación de ejecución
    public ?string $completion_date;         // Fecha de finalización (puede ser nulo)
    public ?string $start_date_execution_phase; // Fecha de inicio de la fase de ejecución (puede ser nulo)
    public ?string $unilateral_termination=null;
    public ?string $bilateral_termination=null;
    public int $project_duration_in_months;  // Duración del proyecto en meses
    public int $reporting_frequency;         // Frecuencia de reportes
    public string $general_objective;        // Objetivo general del proyecto
}
