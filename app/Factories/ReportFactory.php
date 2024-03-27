<?php

namespace App\Factories;

use Exception;
use App\Models\Slug;
use App\Interfaces\Reports\ReportActionsInterface;
use App\Models\Report;

class ReportFactory
{
    private Slug $slug;

    public function getReport($slug_name) : ReportActionsInterface
    {
        $this->getSlug($slug_name);

        $classReport = self::getNamespaceReport();

        return app($classReport);
    }

    public function getNamespaceReport(): string
    {
        $module = Report::where('slug', $this->slug->id)->first();

        if (isset($module)) {
            return $module->namespace;
        } else {
            throw new Exception('No se encontro el modulo');
        }
    }

    public function getSlug($slug_name) : void
    {
        $this->slug = Slug::where('name', $slug_name)->first();

        if (!isset($this->slug)) {
            throw new Exception('No se encontro el slug');
        }
    }
}
