<?php

namespace App\Strategies\StrategiesCruds\Villavicencio;

use App\Models\Villavicencio\Cameras;
use App\Traits\Cruds\ValidateFormRequest;
use App\Http\Requests\Villavicencio\CamerasRequest;
use App\Strategies\StrategiesCruds\BaseCrud;

class StrategyCameras extends BaseCrud
{
    use ValidateFormRequest;

    public function __construct(
        private Cameras $model
    ) {}

    public function getModel() : Cameras
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
                'URL' => $item->url,
            ];
        }

        $data = [
            'data' => $transformedData,
            'meta' => [
                'title' => 'Camaras',
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
        $this->validateRequest(CamerasRequest::class, $request);

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
        $this->validateRequest(CamerasRequest::class, $request);
        
        $item = parent::update($request->toArray(), $id);

        return $item;
    }

    public function destroy($id)
    {
        $item = parent::destroy($id);

        return $item;
    }
}
