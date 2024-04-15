<?php

namespace App\Strategies\StrategiesCruds\Villavicencio;

use Illuminate\Support\Facades\Log;
use App\Models\Villavicencio\Alarms;
use App\Helpers\Helper;
use App\Traits\Cruds\ValidateFormRequest;
use App\Strategies\StrategiesCruds\BaseCrud;
use App\Http\Requests\Villavicencio\AlarmsRequest;

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
        $items = parent::index($request);

        $transformedData = [];
        foreach ($items as $item) {
            $transformedData[] = [
                'ID' => $item->id,
                'Nombre' => $item->name,
                'Direccion' => $item->address,
            ];
        }

        $data = [
            'data' => $transformedData,
            'meta' => [
                'title' => 'Alarmas',
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
        $this->validateRequest(AlarmsRequest::class, $request);

        $request = Helper::transformRequestToPoints($request->toArray(), 'POST');

        $item = parent::store($request);

        return $item;
    }

    public function show($id)
    {
        $item = parent::show($id)->show();

        return $item;
    }

    public function update($request, $id)
    {
        $this->validateRequest(AlarmsRequest::class, $request);
        
        $request = Helper::transformRequestToPoints($request->toArray(), 'PUT');

        $item = parent::update($request, $id);

        return $item;
    }

    public function destroy($id)
    {
        $item = parent::destroy($id);

        return $item;
    }
}
