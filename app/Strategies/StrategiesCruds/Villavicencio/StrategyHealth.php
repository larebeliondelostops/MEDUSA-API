<?php

namespace App\Strategies\StrategiesCruds\Villavicencio;

use App\Models\Villavicencio\Health;
use App\Traits\Cruds\ValidateFormRequest;
use App\Http\Requests\Villavicencio\HealthRequest;
use App\Strategies\StrategiesCruds\BaseCrud;

class StrategyHealth extends BaseCrud
{
    use ValidateFormRequest;

    public function __construct(
        private Health $model
    ) {}

    public function getModel() : Health
    {
        return $this->model;
    }

    public function index($request)
    {
        $items = parent::index($request);

        $transformedData = [];
        foreach ($items as $item) {
            $transformedData[] = [
                'ID' => $item->id,
                'Nombre' => $item->name,
                'Direccion' => $item->address,
                'Pacientes de emergencia' => $item->emergency_patients,
                'Camas de emergencia disponibles' => $item->emergency_beds_available,
                'Salas de operaciones disponibles' => $item->available_operating_rooms,
                'Unidad de cuidados intensivos disponible' => $item->intensive_care_unit_available,
                'Camas de primer nivel' => $item->first_level_beds,
                'Camas de segundo nivel' => $item->second_level_beds,
                'Camas de tercer nivel' => $item->third_level_beds,
                'Banco de sangre' => $item->blood_bank,
                'Doctores en el turno' => $item->doctors_in_the_shift,
                'Enfermeras en el turno' => $item->nurses_in_the_shift,
                'IPS afiliadas' => $item->affiliated_ips,
                'Numero de emergencias al dia' => $item->number_of_emergencies_day,
            ];
        }

        $data = [
            'data' => $transformedData,
            'meta' => [
                'title' => 'Salud',
                'pagination' => [
                    'total' => $items->total(),
                    'perPage' => $items->perPage(),
                    'currentPage' => $items->currentPage(),
                    'lastPage' => $items->lastPage(),
                    'from' => $items->firstItem(),
                    'to' => $items->lastItem(),
                ],
                'ableCreate' => true
            ],
        ];

        return $data;
    }

    public function store($request)
    {
        $this->validateRequest(HealthRequest::class, $request);

        $item = parent::store($request->toArray());

        return $item;
    }

    public function show($id)
    {
        $item = parent::show($id);

        return $item;
    }

    public function update($request, $id)
    {
        $this->validateRequest(HealthRequest::class, $request);
        
        $item = parent::update($request->toArray(), $id);

        return $item;
    }

    public function destroy($id)
    {
        $item = parent::destroy($id);

        return $item;
    }
}
