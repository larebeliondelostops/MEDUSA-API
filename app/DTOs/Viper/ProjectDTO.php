<?php

namespace App\DTOs\Viper;

use \DateTime;
use Carbon\Carbon;
use App\DTOs\Viper\DTO;

namespace App\DTOs\Viper;

class ProjectDTO extends DTO{
    public string $bpin;
    public string $name;
    public string $ocad;
    public string $state;
    public string $substate;
    public float $total_value;
    public float $requested_value;
    public float $executed_value;
    public float $physical_progress;
    public string $responsible_entity;
    public string $sector;
    public string $location;
    public int $beneficiaries;
    public string $planner;
    public string $execution_approval_date;
    public ?string $completion_date;
    public ?string $start_date_execution_phase;
    public int  $project_duration_in_months;
    public int $reporting_frequency;
    public string $general_objective;
}
