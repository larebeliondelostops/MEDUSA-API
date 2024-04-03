<?php

namespace App\Strategies\StrategiesCruds\Villavicencio;

use App\Models\Villavicencio\Cais;
use App\Traits\Cruds\ValidateFormRequest;
use App\Http\Requests\Villavicencio\CaiRequest;
use App\Strategies\StrategiesCruds\BaseCrud;

class StrategyCais extends BaseCrud
{
    use ValidateFormRequest;

    public function __construct(
        private Cais $model
    ) {}

    public function getModel() : Cais
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
        $this->validateRequest(CaiRequest::class, $request);

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
        $this->validateRequest(CaiRequest::class, $request);
        
        $item = parent::update($request->toArray(), $id);

        return $item;
    }

    public function destroy($id)
    {
        $item = parent::destroy($id);

        return $item;
    }
}
