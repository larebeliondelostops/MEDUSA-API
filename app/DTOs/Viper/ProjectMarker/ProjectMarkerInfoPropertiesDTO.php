<?php

namespace App\DTOs\Viper\ProjectMarker;
use App\DTOs\Viper\DTO;
use App\DTOs\Viper\State\StateDTO;
use App\DTOs\Viper\Substate\SubstateDTO;

class ProjectMarkerInfoPropertiesDTO extends DTO
{
    public string $bpin;                     // Identificador único del proyecto
    public string $name;                     // Nombre del proyecto
    public string $ocad;                     // Código OCAD
    public StateDTO $state;                  // Estado del proyecto
    public ?SubstateDTO $substate=null;      // Subestado del proyectos
    public string $responsible_entity;       // Entidad responsable del proyecto
    public float $requested_value;           // Valor solicitado del proyecto
    public float $executed_value = 0.0;      // Valor ejecutado del proyecto
    public string $execution_approval_date;  // Fecha de aprobación de ejecución
    public ?string $completion_date;         // Fecha de finalización (puede ser nulo)
    public ?string $start_date_execution_phase; // Fecha de inicio de la fase de ejecución (puede ser nulo)
}
