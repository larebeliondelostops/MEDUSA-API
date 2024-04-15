<?php

namespace App\Traits\Cruds;

trait CrudActions
{
    public function storeModel($request)
    {
        return $this->getModel()->insert($request);
    }

    public function showModel($id)
    {
        return $this->getModel()->find($id);
    }

    public function updateModel($request, $id)
    {
        return $this->getModel()->find($id)->update($request);
    }

    public function destroyModel($id)
    {
        return $this->getModel()->find($id)->delete();
    }
}