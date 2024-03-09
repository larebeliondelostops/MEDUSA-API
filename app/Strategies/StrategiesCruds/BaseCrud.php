<?php

namespace App\Strategies\StrategiesCruds;

use App\Traits\Cruds\CrudActions;
use App\Interfaces\Cruds\CrudActionsInterface;

abstract class BaseCrud implements CrudActionsInterface
{
    use CrudActions;

    public function index(array $request)
    {
        if (isset($request['start']) && isset($request['end'])) {
            $data = $this->getModel()::whereBetween('created_at', [$request['start'], $request['end']])
                ->paginate($request['count'] ?? 10, ['*'], 'page', $request['page'] ?? 1);
        } else {
            $data = $this->getModel()::paginate($request['count'] ?? 10, ['*'], 'page', $request['page'] ?? 1);
        }

        return $data;
    }

    public function store(array $request)
    {
        return $this->storeModel($request);
    }

    public function show($id)
    {
        return $this->showModel($id);
    }

    public function update(array $request, $id)
    {
        return $this->updateModel($request, $id);
    }

    public function destroy($id)
    {
        return $this->destroyModel($id);
    }
}