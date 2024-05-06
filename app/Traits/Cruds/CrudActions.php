<?php

namespace App\Traits\Cruds;

use Illuminate\Support\Facades\Cache;

trait CrudActions
{
    public function storeModel($request)
    {
        Cache::forget($this->getModel()->getCacheKeyMarker());
        return $this->getModel()->insert($request);
    }

    public function showModel($id)
    {
        return $this->getModel()->find($id);
    }

    public function updateModel($request, $id)
    {
        Cache::forget($this->getModel()->getCacheKeyMarker());
        return $this->getModel()->find($id)->update($request);
    }

    public function destroyModel($id)
    {
        Cache::forget($this->getModel()->getCacheKeyMarker());
        return $this->getModel()->find($id)->delete();
    }
}