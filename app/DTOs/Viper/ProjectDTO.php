<?php

namespace App\DTOs\Viper;

use \DateTime;
use App\DTOs\Viper\DTO;

namespace App\DTOs\Viper;

use \DateTime;

class ProjectDTO extends DTO{
    public function __construct(
        public string $bpin,
        public string $name,
        public string $ocad,
        public string $type,
        public string $state,
        public string $substate,
        public float $total_value,
        public float $requested_value,
        public float $executed_value,
        public float $physical_progress,
        public string $responsible_entity,
        public string $sector,
        public string $location,
        public int $beneficiaries,
        public string $planner,
        public DateTime $execution_approval_date,
        public DateTime $completion_date,
        public string $reporting_frequency,
        public string $general_objective,
        public string $responsible,
    ) {}
}
