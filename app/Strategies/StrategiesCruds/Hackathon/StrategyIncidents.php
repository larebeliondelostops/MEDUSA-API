<?php

namespace App\Strategies\StrategiesCruds\Hackathon;

use Illuminate\Support\Facades\Log;
use App\Models\Villavicencio\Incident;
use App\Interfaces\Modules\hackathon\IncidentInterface;
use App\Http\Request\Modules\hackathon\StoreIncidentRequest;
use App\Http\Request\Modules\hackathon\UpdateIncidentRequest;

class StrategyIncidentsextends extends BaseCrud
{
    use ValidateFormRequest;

    public function __construct(
        private Incident $model
    ) {}

    public function getModel() : Incident
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
                'title' => 'Incidentes',
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
        $this->validateRequest(StoreIncidentRequest::class, $request);

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
        $this->validateRequest(UpdateIncidentRequest::class, $request);
        
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
