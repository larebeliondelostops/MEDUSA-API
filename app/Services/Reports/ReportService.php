<?php

namespace App\Services\Reports;

use App\Factories\ReportFactory;
use App\Interfaces\Reports\ReportInterface;

class ReportService implements ReportInterface
{

    public function __construct(
        private ReportFactory $factory
    )
    {}

    public function getReportsData($request, $method, $slug_name)
    {
        $data = $this->factory->getReport($slug_name)->{$method}($request);

        return response()->json($data);
    }
}