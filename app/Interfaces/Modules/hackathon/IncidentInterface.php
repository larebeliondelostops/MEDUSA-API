<?php

namespace App\Interfaces\Modules\hackathon;
use Illuminate\Database\Eloquent\Collection;

interface IncidentInterface
{
    public function getAllIncidents() : Collection;
    public function getIncidentById(int $id) : Collection;
    public function createIncident(array $data) : Collection;
    public function updateIncident(array $data, int $id) : Collection;
    public function deleteIncident(int $id) : Collection;
}