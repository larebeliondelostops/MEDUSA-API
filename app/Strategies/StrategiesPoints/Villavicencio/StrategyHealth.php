<?php

namespace App\Strategies\StrategiesPoints\Villavicencio;

use Exception;
use Ramsey\Uuid\Uuid;
use App\Models\Villavicencio\Health;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use App\Interfaces\Markers\PointsInterface;

class StrategyHealth implements PointsInterface
{

    public function __construct(
        private Health $model
    ) {}

    public function getModel() : Health
    {
        return $this->model;
    }

    public function allPoints()
    {
        return $this->getModel()->allPoints();
    }

    public function getInfoPoint($id)
    {
        $health = $this->getModel()->where('uuid', $id)->first();

        $health = [
            'title' => $health->name,
            'properties' => [
                'Direccion' => $health->address,
                'Pacientes en Emergencia' => $health->emergencyPatients ?? null,
                'Camas de Emergencia Disponibles' => $health->emergencyBedsAvailable ?? null,
                'Quirófanos Disponibles' => $health->availableOperatingRooms ?? null,
                'Unidad de Cuidados Intensivos Disponible' => $health->intensiveCareUnitAvailable ?? null,
                'Camas de Primer Nive' => $health->firstLevelBeds ?? null,
                'Camas de Segundo Nivel' => $health->secondLevelBeds ?? null,
                'Camas de Tercer Nivel' => $health->thirdLevelBeds ?? null,
                'Banco de Sangre' => $health->bloodBank ?? null,
                'Médicos en Turno' => $health->doctorsInTheShift ?? null,
                'Enfermeras en Turno' => $health->nursesInTheShift ?? null,
                'IPS Afiliada' => $health->affiliatedIps ?? null,
                'Número de Emergencias al Día' => $health->numberOfEmergenciesDay ?? null
            ]
        ];

        return $health;
    }
}
