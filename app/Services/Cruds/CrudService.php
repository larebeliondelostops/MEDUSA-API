<?php

namespace App\Services\Cruds;

use App\Factories\ModuleFactory;
use App\Interfaces\Cruds\CrudInterface;

class CrudService implements CrudInterface
{

    public function __construct(
        private ModuleFactory $moduleFactory
    )
    {}

    public function index($request, $slug)
    {
        return $this->moduleFactory->getModule($slug)->index($request);
    }

    public function store($request, $slug)
    {
        return $this->moduleFactory->getModule($slug)->store($request);
    }

    public function show($slug, $id)
    {
        return $this->moduleFactory->getModule($slug)->show($id);
    }

    public function update($request, $slug, $id)
    {
        return $this->moduleFactory->getModule($slug)->update($request, $id);
    }

    public function destroy($slug, $id)
    {
        return $this->moduleFactory->getModule($slug)->destroy($id);
    }
}