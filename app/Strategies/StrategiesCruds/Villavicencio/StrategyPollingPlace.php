<?php

namespace App\Strategies\StrategiesCruds\Villavicencio;

use App\Helpers\Helper;
use App\Models\Villavicencio\PollingPlace;
use App\Traits\Cruds\ValidateFormRequest;
use App\Http\Requests\Villavicencio\PollingPlaceRequest;
use App\Strategies\StrategiesCruds\BaseCrud;

class StrategyPollingPlace extends BaseCrud
{
    use ValidateFormRequest;

    public function __construct(
        private PollingPlace $model
    ) {}

    public function getModel() : PollingPlace
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
                'Potencial de Mujeres' => $item->potential_women,
                'Potencial de Hombres' => $item->potential_men,
                'Total de Votos' => $item->total_votes,
                'Mesas' => $item->tables,
            ];
        }
        //dd($transformedData);
        $data = [
            'data' => $transformedData,
            'meta' => [
                'title' => 'Mesas de votación',
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
        $this->validateRequest(PollingPlaceRequest::class, $request);

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
        $this->validateRequest(PollingPlaceRequest::class, $request);
        
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
