<?php

namespace App\Interfaces\Modules\hackathon;
use Illuminate\Database\Eloquent\Collection;

interface IncidentInterface
{
    public function getAllIncidents() : Collection | null;
    public function getIncidentById(int $id) : Collection | null;
    public function createIncident(array $data) : Collection | null;
    public function updateIncident(array $data, int $id) : Collection | null;
    public function deleteIncident(int $id) : Collection | null;
}