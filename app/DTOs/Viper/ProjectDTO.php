<?php

namespace App\DTOs\Viper;

use spatie\DataTransferObject\DataTransferObject;
use \DateTime;

class ProjectDTO extends DataTransferObject {
    public string $BPINCode;
    public string $name;
    public string $ocad;
    public string $type;
    public string $state;
    public string $subState;
    public float $totalValue;
    public float $requestedValue;
    public float $executedValue;
    public float $physicalProgress;
    public string $responsibleEntity;
    public string $sector;
    public string $location;
    public string $beneficiaries;
    public string $planner;
    public DateTime $executionApprovalDate;
    public DateTime $completionDate;
    public int $reportingFrequency;
    public string $generalObjetive;
    public string $responsible;
}