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
                'Pacientes en Emergencia' => $health->emergency_patients ?? null,
                'Camas de Emergencia Disponibles' => $health->emergency_beds_vailable ?? null,
                'Quirófanos Disponibles' => $health->available_operating_rooms ?? null,
                'Unidad de Cuidados Intensivos Disponible' => $health->intensive_care_unit_available ?? null,
                'Camas de Primer Nive' => $health->first_level_beds ?? null,
                'Camas de Segundo Nivel' => $health->second_level_beds ?? null,
                'Camas de Tercer Nivel' => $health->third_level_beds ?? null,
                'Banco de Sangre' => $health->blood_bank ?? null,
                'Médicos en Turno' => $health->doctors_in_the_shift ?? null,
                'Enfermeras en Turno' => $health->nurses_in_the_shift ?? null,
                'IPS Afiliada' => $health->affiliated_ips ?? null,
                'Número de Emergencias al Día' => $health->number_of_emergencies_day ?? null
            ]
        ];

        return $health;
    }
}
