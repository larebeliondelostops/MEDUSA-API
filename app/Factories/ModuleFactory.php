<?php

namespace App\Factories;

use Exception;
use App\Models\Slug;
use App\Models\Module;
use App\Interfaces\Cruds\CrudActionsInterface;

class ModuleFactory
{
    public function getModule($slug) : CrudActionsInterface
    {
        $module = self::getNamespaceModule($slug);

        return app($module);
    }

    public function getNamespaceModule($slug): string
    {
        $slug_id = self::getIdSlug($slug);

        $module = Module::where('slug', $slug_id)->first();

        if (isset($module)) {
            return $module->namespace;
        } else {
            throw new Exception('No se encontro el modulo');
        }
    }

    public function getIdSlug($slug)
    {
        $slug = Slug::where('name', $slug)->first();

        if (isset($slug)) {
            return $slug->id;
        } else {
            throw new Exception('No se encontro el slug');
        }
    }
}
