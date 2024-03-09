<?php

namespace App\Strategies\StrategiesCruds\Villavicencio;

use App\Models\Alarms;
use App\Traits\Cruds\ValidateFormRequest;
use App\Http\Request\Alarms\AlarmsRequest;
use App\Strategies\StrategiesCruds\BaseCrud;

class StrategyAlarms extends BaseCrud
{
    use ValidateFormRequest;

    public function __construct(
        private Alarms $model
    ) {}

    public function getModel() : Alarms
    {
        return $this->model;
    }

    public function index($request)
    {
        $alarms = parent::index($request);

        $transformedData = [];
        foreach ($alarms as $alarm) {
            $transformedData[] = [
                'ID' => $alarm->id,
                'Nombre' => $alarm->name,
                'Direccion' => $alarm->address,
            ];
        }

        $data = [
            'data' => $transformedData,
            'meta' => [
                'title' => 'Alarmas',
                'pagination' => [
                    'total' => $alarms->total(),
                    'perPage' => $alarms->perPage(),
                    'currentPage' => $alarms->currentPage(),
                    'lastPage' => $alarms->lastPage(),
                    'from' => $alarms->firstItem(),
                    'to' => $alarms->lastItem(),
                ],
                'ableCreate' => true
            ],
        ];

        return $data;
    }

    public function store($request)
    {
        $this->validateRequest(AlarmsRequest::class, $request);

        $alarm = parent::store($request->toArray());

        return $alarm;
    }

    public function show($id)
    {
        $alarm = parent::show($id);

        return $alarm;
    }

    public function update($request, $id)
    {
        $alarm = parent::update($request->toArray(), $id);

        return $alarm;
    }

    public function destroy($id)
    {
        $alarm = parent::destroy($id);

        return $alarm;
    }
}
